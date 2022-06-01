<div class="home_content" style="float:right;">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mt-4"
        style="border-radius:20px; margin-left:20px; margin-right:20px">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('Qemer pos', 'Qemer pos') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    @if (auth()->user()->role=='casher')
                    <li class="navbar-item position-relative mx-4" style="margin-top:8px;">
                        <a type="" data-bs-toggle="modal" data-bs-target="#cartDisplay"
                            class="bi fs-5 bi-cart text-dark">
                            <span
                                class="position-absolute mx-2 text-small top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{$cartTotal}}

                            </span>
                        </a>
                    </li>

                    @extends('Templates.Modals.cartDisplay')
                    
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
</div>
</div>
</div>
{{-- end of colabssable list --}}
