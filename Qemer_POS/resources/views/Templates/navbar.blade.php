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
                    <li class="navbar-item position-relative mx-4" style="margin-top:8px;">
                        <a type="" data-bs-toggle="modal" data-bs-target="#addCategory"
                            class="bi fs-5  bi-cart text-dark">
                            <span
                                class="position-absolute mx-2 text-small top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{$cartTotal}}

                            </span>
                        </a>
                    </li>
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

<!-- //modal for cartDisplay -->

<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center modal-title">Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('receipt') }}">
                    @csrf
                    <table class="table   table-responsive">
                        <thead class="thead-inverse|thead-default">
                            <tr>
                                <th>Item Name</th>
                                <th>Amount</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informations as $info )
                            <tr>

                                <td scope="row">{{ $info->item->name }}</td>
                                <td>{{ $info->amount }}</td>
                                <td>{{$info->total_price }}Br</td>
                                <td>
                                    <div class="col-sm-4">
                                        <a href="{{ url('returnToStock'.'/'.$info->id) }}" type="submit" class="btn"><i
                                                class="bi bi-x-lg icon-red fs-6" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="container ">
                        <div class="d-flex justify-content-center align-items-center ">

                            <strong>
                                <p style="color:rgb(0, 241, 32);" class="text-center display-6">{{ $totalItemPrice }}
                                </p>
                            </strong>
                            <p class=" text-dark   text-center display-6 ">Br</p>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row align-items-center justify-content-center ">
                            <div class="col-md-3 mx-auto">
                                <label for="Tin_number">TIN number:</label>
                            </div>
                            <div class="col mx-0 ">
                                <input type="text" class=" col-md-5 form-control mx-auto my-4" name="Tin_number"
                                    placeholder="Enter customer tin number" />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-center ">
                    <button type="submit" class=" mx-auto btn btn-primary">Proceed</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
{{-- end of colabssable list --}}
