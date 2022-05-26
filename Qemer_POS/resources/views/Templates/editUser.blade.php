 
@extends('layouts.app')
@section('content')

<div class="container my-5"style="">
    <div class="row align-items-center ">
        <div class="col-md-8 mx-auto ">
            <strong>    
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <h1>{{ $message }}</h1>
            </div>
           @endif
            </strong>

           <div class="card mt-4" style="background-color:rgb(231, 231, 231);">
                {{-- <div class="card-header text-white text-center justify-content-center align-items-center  "style="background-color:orange;">{{ __('Stock maintaining form') }}</div> --}}
                <div class="card-body">
                    <form method="POST" action="{{ url('updateUser/'.$user->id) }} " enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="form-group row py-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Enter the user name')}}" value={{$user->name}} required autocomplete="name" autofocus required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-3">
                            <label for="Email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="{{ __('Enter new email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value={{$user->email }} autocomplete="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
   
                        <div class="form-group row mb-3">    
                        <label for="Role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-6  ">
                                     <select class="form-control" id="role" name="role" required focus>

                                         <option value="admin" selected>Admin</option>
                                         <option value="casher" selected>Casher</option>      
                                         <option value="Select Role" disabled selected>Click to Select Role</option>       
                                     </select>
                                </div>
                       </div>

                        <div class="form-group row py-3">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
                            <div class="col-md-6">
                          <input name="avatar"   type="file" class="form-control" value={{$user->avatar}}>
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-3">
                            <label for="Phone number" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control @error('price') is-invalid @enderror" name="phone_number" autocomplete="phone_number" placeholder="{{ __('Enter the new phone number') }}" value={{$user->phone_number}} required>

                                @error('Phone number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 justify-content-center text-center align-items-center my-3">
                                <button type="submit" class="btn btn-primary ">
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

@endsection
 </div>