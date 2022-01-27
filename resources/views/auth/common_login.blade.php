<!doctype html>
<html lang="en">

<head>
    <title>Common Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('/backend/css/style.css') }}">
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        @include('backend.developer.layouts.flash')
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Common Login</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="phone" placeholder="phone" type="phone"
                                    class="form-control rounded-left @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-flex">
                                <input id="password" placeholder="Password" type="password"
                                    class="form-control rounded-left @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">
                                        {{ __('Remember Me') }}
                                        <input type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                            <a class="btn btn-lg btn-primary btn-block" href="{{ url('auth/facebook') }}">
                                <strong>Login With Facebook</strong>
                            </a>
                            <a class="btn btn-lg btn-danger btn-block" href="{{ url('auth/google') }}">
                                <strong>Login With Google</strong>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

</html>
