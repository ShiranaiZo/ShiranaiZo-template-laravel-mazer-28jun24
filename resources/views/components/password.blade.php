@section('css')
    <style>
        .toggle-password {
            float: right;
            cursor: pointer;
            margin-right: 10px;
            margin-top: -25px;
        }
    </style>
@endsection


<input type="password"
    id="{{ $id }}"
    class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}"
    name="{{ $name }}"
    placeholder="Password"
    {{ $required }}
>
<i class="toggle-password fa fa-fw fa-eye-slash"></i>

@section('js')
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            input = $(this).parent().find("input[name='{{ $name }}']");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endsection
