<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Mazer Admin Dashboard</title>

	<link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
</head>

<body>
	<div id="auth">
		<div class="row h-100">
			<div class="col-lg-5 col-12">
				<div id="auth-left">
					<div class="auth-logo">
						<a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo"></a>
					</div>

					<h1 class="auth-title">Log in.</h1>

					<form method="POST" action="{{ route('login') }}">
                        @csrf

						<div class="form-group position-relative has-icon-left mb-4">
							<input type="email" class="form-control form-control-xl" placeholder="Username" name="email" required autofocus>
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>

						<div class="form-group position-relative has-icon-left mb-4">
							<input type="password" class="form-control form-control-xl" placeholder="Password" name="password" required>
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>

						<div class="form-check form-check-lg d-flex align-items-end">
							<input class="form-check-input me-2" type="checkbox" id="flexCheckDefault" name="remember">
							<label class="form-check-label text-gray-600" for="flexCheckDefault">
								Keep me logged in
							</label>
						</div>

						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
					</form>
				</div>
			</div>

			<div class="col-lg-7 d-none d-lg-block">
				<div id="auth-right">

				</div>
			</div>
		</div>
	</div>
</body>

<script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
<script src="{{ asset('assets/helpers/helpers.js') }}"></script>
<script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>

<script>
    @error('error')
        toast('{{ $message }}', 'error')
    @enderror
</script>

</html>
