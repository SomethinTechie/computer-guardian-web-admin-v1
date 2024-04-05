<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Computer Guardian - Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background: #f3bf43;
            }
            .row {
                width: 100%!important;
            }
        </style>
    </head>
    <body class="antialiased" style="">
        <div class="content-center" style="width: 100%;height: 100vh;background-color: #f3bf43">
            <div class="auth-form" style="padding-right: 5px">
                <h2 class="mb-3 mt-4" style="padding-left: 20px">Admin sign in</h2>
                <form method="POST" action="{{ route('login') }}" style="padding: 20px;float: left;width: 100%">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="">{{ __('Email Address') }}</label>
                        <div class="input-group">
                            <input id="email" placeholder="Enter email..." type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="border-bottom: none">
                        </div>
                        <div class="row" style="font-size: 12px;color: #cc0000;padding: 4px 25px">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    

                    <div class="row mb-3">
                        <label for="password" class="">{{ __('Password') }}</label>

                        <div class="input-group">
                                <div class="col-md-12">
                                <input id="password" placeholder="Enter password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border: none">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-check" style="display: flex;align-items: center">
                                <input class="form-check-input mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0" style="width: 100%">
                        <div class="col-md-12">
                            <button type="submit" class="std-btn primary" style="justify-content: center">
                                {{ __('SIGN IN') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link mt-3 text-center col-md-12" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
