@extends('layouts.app')

@section('content')

<div class="container my-5"style="">
    <div class="row align-items-center ">
        <div class="col-md-8 mx-auto ">
            <strong>    
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <h4>{{ $message }}</h1>
            </div>
           @endif
            </strong>

            <div class="py-5 text-center">
              <i class="bi bi-plus fs-1 icon-green" aria-hidden="true"></i>
            </div>

           <div class="mt-3">

                    <form method="POST" action="{{ url('addBranch') }}">
                      @csrf
                        
                      <div class="row g-4">
                        <div class="col-12">
                          <label for="branch_name" class="form-label">{{ __('Branch Name') }}</label>

                                <input id="branch_name" type="text" class="form-control @error('branch_name') is-invalid @enderror" name="branch_name" placeholder="{{ __('Enter the branch name')}}" required autocomplete="name" autofocus required>

                                @error('branch_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
            
                        <div class="col-4">
                          <label for="subcity" class="form-label">{{ __('Subcity') }}</label>

                                <input id="subcity" type="text" class="form-control @error('subcity') is-invalid @enderror" name="subcity" placeholder="{{ __('Enter the subcity')}}" required autocomplete="name" autofocus required>

                                @error('subcity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
            
                        <div class="col-4">
                          <label for="city" class="form-label">{{ __('City') }}</label>

                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" autocomplete="city" placeholder="{{ __('Enter the city name') }}" required>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                        </div>

                        <div class="col-4">
                          <label for="country" class="form-label">{{ __('Country') }}</label>

                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" autocomplete="country" placeholder="{{ __('Enter the country name') }}" required>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                        </div>
            
                      <button class="w-100 btn btn-primary btn" type="submit">{{ __('Register') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection