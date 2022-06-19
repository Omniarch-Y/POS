@extends('layouts.app')

@section('content')

<div class="container my-5"style="">
    <div class="row align-items-center ">
        <div class="col-md-8 mx-auto ">
            <strong>    
            @if ($message = Session::get('success'))
            <div class="alert alert-success center_text">
                <h4>{{ $message }}</h4>
            </div>
           @endif
            </strong>

                <form method="POST" action="{{ route('registerUser') }}" enctype="multipart/form-data">
                    @csrf

                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                            <label for="name" class="form-label lable_color">{{ __('Name') }}</label>

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Enter the user name')}}" required autocomplete="name" autofocus required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
                            </div>

                            <div class="col-sm-6">
                                <label for="Role" class="form-label lable_color">{{ __('Role') }}</label>

                                <select class="form-control" id="role" name="role" required focus>

                                    <option value="admin" selected>Admin</option>
                                    <option value="casher" selected>Casher</option>      
                                    <option value="Select Role" disabled selected>Click to Select Role</option>       
                                </select>
                            </div>

                            <div class="col-12">
                            <label for="Email" class="form-label lable_color">{{ __('Email') }}</label>

                                    <input id="email" placeholder="{{ __('Enter new email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <div class="col-12">
                            <label for="avatar" class="form-label lable_color">{{ __('Avatar') }}</label>
                            <input name="avatar" type="file" class="form-control">
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-12">
                            <label for="Phone number" class="form-label lable_color">{{ __('Phone number') }}</label>

                                    <input id="phone_number" type="number" class="form-control @error('price') is-invalid @enderror" name="phone_number" autocomplete="phone_number" placeholder="{{ __('Enter the new phone number') }}" required>

                                    @error('Phone number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                            </div>

                            <div class="col-sm-6">
                                <label for="password" class="form-label lable_color">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="{{ __('Enter password')}}" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                            <div class="col-sm-6">
                                <label for="password-confirm"
                                    class="form-label lable_color">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation"placeholder="{{ __('Confirm password')}}" required autocomplete="new-password">
                            </div>         

                            <div class="col-sm-12">
                                <label for="Branch" class="form-label lable_color">{{ __('Branch') }}</label>

                                <select class="form-control" id="branch" name="branch" required focus>
                                    @foreach($branches as $branch)
                                    <option value="{{$branch->id}}" selected>{{$branch->branch_name}}</option>
                                    @endforeach
                                    <option value="Select Role" disabled selected>Click to Select Branch</option>       
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="subcity" class="form-label lable_color">{{ __('Subcity') }}</label>

                                    <input id="subcity" type="text" class="form-control @error('subcity') is-invalid @enderror" name="subcity" placeholder="{{ __('Enter the subcity')}}" required autocomplete="name" autofocus required>

                                    @error('subcity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                            <div class="col-4">
                                <label for="city" class="form-label lable_color">{{ __('City') }}</label>

                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" autocomplete="city" placeholder="{{ __('Enter the city name') }}" required>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                            </div>

                            <div class="col-4">
                                <label for="country" class="form-label lable_color">{{ __('Country') }}</label>

                                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" autocomplete="country" placeholder="{{ __('Enter the country name') }}" required>

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                            </div>
                            
                                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>

@endsection

