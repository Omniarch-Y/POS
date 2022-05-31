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
                  <input type="number" name="branch_id" hidden value="{{auth()->user()->branch_id}}">

                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                    <label for="name" class="form-label">{{ __('Name') }}</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Enter the user name')}}" required autocomplete="name" autofocus required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    
                    </div>

                    <div class="col-sm-6">
                        <label for="Role" class="form-label">{{ __('Role') }}</label>

                        <select class="form-control" id="role" name="role" required focus>

                            <option value="admin" selected>Admin</option>
                            <option value="casher" selected>Casher</option>      
                            <option value="Select Role" disabled selected>Click to Select Role</option>       
                        </select>
                    </div>

                    <div class="col-12">
                    <label for="Email" class="form-label">{{ __('Email') }}</label>

                            <input id="email" placeholder="{{ __('Enter new email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="col-12">
                    <label for="avatar" class="form-label">{{ __('Avatar') }}</label>
                    <input name="avatar" type="file" class="form-control">
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="col-12">
                    <label for="Phone number" class="form-label">{{ __('Phone number') }}</label>

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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ">{{ __('Register') }}</button>
                    </div>

                </form>
             </div>
          </div>
      </div>
   </div>
</div>
 <!--End of  Modal for adding new User -->