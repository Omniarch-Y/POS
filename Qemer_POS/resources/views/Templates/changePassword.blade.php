@extends('layouts.app')

@section('content')


<body class="area">
   
    <ul class="circles">
        @for ($x=0 ;$x<100;$x++)
         <li></li>
        @endfor
    </ul>
    {{-- end animation for the background --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                        <i class=" text-white bi bi-lightning-charge-fill fs-2" aria-hidden="true">Qemer pos</i>
                <div class="card shadow" style=" width:100%; border-radius:12px">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active px-20" id="update-tab" data-bs-toggle="tab" data-bs-target="#update"
                                type="button" role="tab" aria-controls="update" aria-selected="true">Update</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">

                        {{-- tab for update --}}
                        <div class="card-body tab-pane fade show active" id="update" role="tabpanel"
                            aria-labelledby="update-tab">
                            <form method="POST" action="{{ route('updatePass') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
