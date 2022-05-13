{{-- <div class="modal fade" id="wee" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
        <div class="modal-content container">
            <div class="modal-header">
                <h5 class="text-center modal-title">User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

               <center>

                    <img src="{{ asset('storage/userImages/'.auth()->user()->avatar) }}" alt="" class="mx-auto mt-3" style="border-radius:10px;width: 10rem; height:10rem">
                 
               </center> 

                </div>
                <form method="POST" action="{{ url('receipt') }}">
                    @csrf
                    <table class="table table-responsive">
                        <thead class="thead-inverse|thead-default">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td scope="row">{{ auth()->user()->id }}</td>
                                <td>{{ auth()->user()->name }}</td>
                                <td>{{ auth()->user()->email }}</td>
                                <td>{{ auth()->user()->role }}</td>
                            </tr>
                        </tbody>
                    </table>

            </div>
            <div class="container">
                <div class="row align-items-center justify-content-center ">
                   
                    <a  class="mx-auto btn btn-primary" href="{{ route('login') }}">Changed Password</a>
                </div>
            </div>
            </form>
        </div>
    </div> --}}


    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content container">
                <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel">User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                     <img src="{{ asset('storage/userImages/'.auth()->user()->avatar) }}" alt="" class="mx-auto mt-3" style="border-radius:10px;width: 10rem; height:10rem">
                </center> 

                    <table class="table table-responsive">
                        <thead class="thead-inverse|thead-default">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td scope="row">{{ auth()->user()->id }}</td>
                                <td>{{ auth()->user()->name }}</td>
                                <td>{{ auth()->user()->email }}</td>
                                <td>{{ auth()->user()->role }}</td>
                            </tr>
                        </tbody>
                    </table>

            </div>
            <div class="">
                <div class="row align-items-center justify-content-center mb-0">
                    <button class="btn btn-danger" data-bs-target="#changePassword" data-bs-toggle="modal" data-bs-dismiss="modal">Change Password</button>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="changePassword" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel2">Change Password</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('updatePass')}}">
                    @csrf

                    <div class="row mb-3">
                        <label for="old_password"
                            class="col-md-4 col-form-label text-md-end">{{ __('Old Password') }}</label>

                        <div class="col-md-6">
                            <input id="old_password" type="password"
                                class="form-control @error('old_password') is-invalid @enderror"
                                name="old_password" required autocomplete="old-password">

                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

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
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm New Password') }}</label>

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
            <div class="modal-footer">
              <button class="btn btn-primary" data-bs-target="#userModal" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
            </div>
          </div>
        </div>
      </div>