<!-- Start of Modal for adding new User -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
             <div class="modal-header justify-content-center">
 <center><h2 class="modal-title text-dark text-center "style=" justify-content-center">{{ __('User registration form') }}</h2></center>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
          <div class="modal-body">
             <div class="container-fluid">
                         <form method="POST" action="{{ route('registerUser') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" placeholder="{{ __('Enter name')}}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" placeholder="{{ __('Enter email')}}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone_number"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone_number" type="number"
                                            class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                            value="{{ old('phone_number') }}" placeholder="{{ __('Enter phone number') }}" required autocomplete="phone_number" autofocus>

                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
        
                                    <div class="col-md-6">
                                        <select class="form-control" id="role" name="role" required focus>
                                                           
                                            <option value="admin" selected>Admin</option>
                                            <option value="casher" selected>Casher</option>       
                                          
                                            <option value="Select Role" disabled selected>Click to Select Role</option>       
                                        </select>
        
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="avatar"  class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
                                    <div class="col-md-6">
                                  <input name="avatar"   type="file" class="form-control" required >
                                        @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="{{ __('Enter password')}}" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation"placeholder="{{ __('Confirm password')}}" required autocomplete="new-password">
                                    </div>
                                </div>                   
              
                     </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary ">
                {{ __('Register') }}
            </button>
          </div>
       </form>
       </div>
    </div>
 </div>
 </div>
 <!--End of  Modal for adding new User -->