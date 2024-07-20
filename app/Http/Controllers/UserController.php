<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $title = "Users";
    protected $titleSingle = "User";

    private $routes = [
        "index" => "users.index",
        "create" => "users.create",
        "store" => "users.store",
        "edit" => "users.edit",
        "update" => "users.update",
        "delete" => "users.destroy",
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Important
            $data["title"] = $this->titleSingle;
            $data["routes"] = arrayOnly($this->routes, ["create", "edit", "delete"]);
        // -----------

        $data["theads"] = [
            "No",
            "Name",
            "Email",
            "Action",
        ];

        $data['columns'] = [];

        try {
            $data["columns"] = User::latest()->get();
        } catch (\Exception $e) {
            Log::error(actionMessage("failed", "retrieved"), ["error" => $e->getMessage(), "stack" => $e->getTraceAsString()]);
        }

        return view("users.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Important
            $data["title"] = "Add $this->titleSingle";
            $data["routes"] = arrayOnly($this->routes, ["index", "store"]);
        // -----------

        $data["elements"] = [
            "name" => [
                "type" => "text",
                "id" => "name",
                "name" => "name",
                "label" => "Name",
                "placeholder" => "Name",
                "required" => "required",
            ],
            "email" => [
                "type" => "email",
                "id" => "email",
                "name" => "email",
                "label" => "Email",
                "placeholder" => "Email",
                "required" => "required",
            ],
            "password"=> [
                "type" => "password",
                "id" => "password",
                "name" => "password",
                "label" => "Password",
                "placeholder" => "Password",
                "required" => "required",
            ],
            "show_password"=> [
                "type" => "checkbox",
                "id" => "show_password",
                "name" => "show_password[]",
                "required" => "",
                "content" => [
                    "show_password"=> [
                        "id" => "show_password",
                        "label" => "Show Password",
                    ],
                ]
            ],
        ];

        return view("users.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $titleMethod = 'added';

        $request->validate([
            "email"=>"required|unique:users,email,NULL,id,deleted_at,NULL|email:rfc,filter",
            "name"=>"required",
            "password"=>"required|min:8",
        ]);

        $redirect = redirect()->route("users.index");

        DB::beginTransaction();

        try {
            $data = $request->except("_token", "password");

            $data["password"] = bcrypt($request->password);

            User::create($data);

            DB::commit();

            $redirect = $redirect->with("success", actionMessage("success", $titleMethod));
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error(actionMessage("failed", $titleMethod).":", ["error" => $e->getMessage(), "stack" => $e->getTraceAsString()]);

            $redirect = $redirect->with("error", actionMessage("failed", $titleMethod));
        }

        return $redirect;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Important
            $data["title"] = "Edit $this->titleSingle";
            $data["routes"] = arrayOnly($this->routes, ["index", "update"]);
        // -----------

        $data['data'] = null;

        try {
            $data["data"] = User::findOrFail($id);

            $data["elements"] = [
                "name" => [
                    "type" => "text",
                    "id" => "name",
                    "name" => "name",
                    "label" => "Name",
                    "placeholder" => "Name",
                    "required" => "required",
                    "value" => $data['data']->name,
                ],
                "email" => [
                    "type" => "email",
                    "id" => "email",
                    "name" => "email",
                    "label" => "Email",
                    "placeholder" => "Email",
                    "required" => "required",
                    "value" => $data['data']->email,
                ],
                "password"=> [
                    "type" => "password",
                    "id" => "password",
                    "name" => "password",
                    "label" => "Password",
                    "placeholder" => "Password",
                    "required" => "",
                ],
                "show_password"=> [
                    "type" => "checkbox",
                    "id" => "show_password",
                    "name" => "show_password[]",
                    "required" => "",
                    "content" => [
                        "show_password"=> [
                            "id" => "show_password",
                            "label" => "Show Password",
                        ],
                    ]
                ],
            ];

            return view("users.edit", $data);
        } catch (\Exception $e) {
            Log::error(actionMessage("failed", "retrieved"), ["error" => $e->getMessage(), "stack" => $e->getTraceAsString()]);
            abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $titleMethod = 'updated';

        $request->validate([
            "email"=>"required|unique:users,email,".$id.",id,deleted_at,NULL|email:rfc,filter",
            "name"=>"required",
            "password"=>"nullable|min:8",
        ]);

        $redirect = redirect()->route("users.index");

        DB::beginTransaction();

        try {
            $data = $request->except("_token", "_method", "password");

            $newPassword = $request->password;

            if (filled($newPassword)) {
                $data["password"] = bcrypt($newPassword);
            }

            User::findOrFail($id)->update($data);

            DB::commit();

            $redirect = $redirect->with("success", actionMessage("success", $titleMethod));
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error(actionMessage("failed", $titleMethod).":", ["error" => $e->getMessage(), "stack" => $e->getTraceAsString()]);

            $redirect = $redirect->with("error", actionMessage("failed", $titleMethod));
        }

        return $redirect;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $titleMethod = 'deleted';

        $redirect = redirect()->back();

        DB::beginTransaction();

        try {
            if ($id == auth()->user()->id) {
                throw new \Exception("You can't delete your own account.");
            }

            User::findOrFail($id)->delete();

            DB::commit();

            $redirect = $redirect->with("success", actionMessage("success", $titleMethod));
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error(actionMessage("failed", $titleMethod), ["error" => $e->getMessage(), "stack" => $e->getTraceAsString()]);

            $redirect = $redirect->with("error", actionMessage("failed", $titleMethod));
        }

        return $redirect;
    }
}
