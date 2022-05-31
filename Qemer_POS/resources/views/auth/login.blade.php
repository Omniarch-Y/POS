{{-- animation for the background --}}

<body class="area">
    
    <ul class="circles">
        @for ($x=0 ;$x<100;$x++)
         <li></li>
        @endfor
    </ul>
    {{-- end animation for the background --}}
    
    <div class="masthead">
        <div class="masthead-content text-white">
            <div class="container-fluid px-4 px-lg-0">
                <p class="fst-italic lh-1 mb-4 fs-1 text-center">Welcome Back!</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row login-input-group mb-3">
                        {{-- <label for="email"
                            class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                        <div class="col">
                            <input id="email" type="email"
                                class="form-control form-control-user @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email Address..." required autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row login-input-group mb-4">
                        {{-- <label for="password"
                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                        <div class="col">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row text-center login-input-group mb-3">
                        {{-- <label for="password"
                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                        <div class="col">
                           <button type="submit" class="btn btn-primary mb-4">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif

                        </div>
                    </div>

                    </form>
            </div>
        </div>
    </div>
    <!-- Social Icons-->
    <!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
    {{-- <div class="social-icons">
        <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
        </div>
    </div> --}}
</body>
