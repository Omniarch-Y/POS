

{{-- start of item list container --}}
<div class="container">
    <div class="container">
       <div class="row">
          <div class=" col-md-6">
          <strong>    
                 @if ($message = Session::get('success'))
                 <div class="alert alert-success">
                     <h1>{{ $message }}</h1>
                 </div>
                @endif     
         </strong>
 
         <strong>    
                 @if ($message = Session::get('error'))
                 <div class="alert alert-danger">
                     <h1>{{ $message }}</h1>
                 </div>
                @endif     
         </strong>
     
        <input type="text" class="form-control" id="search_all" placeholder="Search..." wire:model="search" style="margin-top:2rem; margin-left:10rem;"/>
     </div>
     <div class="col-md-6">
         <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addUser" style="margin-top:2rem; margin-left:10rem; margin-right:1rem;"><i class="bi bi-person-plus-fill fs-6" aria-hidden="true" ></i></button> 
     </div>
    </div>
    </div>
 
 <!-- Start of Modal for adding new Item -->
 <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
             <div class="modal-header justify-content-center">
 <center><h2 class="modal-title text-dark text-center "style=" justify-content-center">{{ __('User registration form') }}</h2></center>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
          <div class="modal-body">
             <div class="container-fluid">
                         <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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
                                          
                                            <option value="Select Role" disabled selected>Click to Select Category</option>       
                                        </select>
        
                                        @error('role')
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
 <!--End of  Modal for adding new Item -->
 
 <script>
    var modelId = document.getElementById('modelId');
 
    modelId.addEventListener('show.bs.modal', function (event) {
         // Button that triggered the modal
         let button = event.relatedTarget;
         // Extract info from data-bs-* attributes
         let recipient = button.getAttribute('data-bs-whatever');
 
       // Use above variables to manipulate the DOM
    });
 </script>
 
  
     
     <div class="row justify-content-md-evenly justify-content-lg-center align-items-center container">
   
             <table class="table table-responsive table-hover table-light my-5">
                <thead>
                   <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone number</th>
                      <th scope="col">Role</th>
 
                   </tr>
                </thead>
                <tbody>
 
                      @foreach($users as $user)
                      <tr>
                      <th scope="row">{{$user->id}}</th>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->phone_number}}</td>
                      <td>{{$user->role}}</td>
                      <td>
                         <div class="row">
                            <div class="col-sm-4">
                         <a href ="{{ url('editUser/'.$user->id) }}"type="submit" class="btn"><i class="bi bi-pencil-square icon-green fs-4" aria-hidden="true" ></i></a>
                      </div>
                      <div class="col-sm-4">
                         <form action="{{ url('deleteUser'.'/'.$user->id) }}"  method="POST" accept-charset="UTF-8">  
                            @csrf
                            @method('DELETE')
                         <button type="submit" class="btn" onClick = "return confirm('Are you sure you want to continue?')"><i class="bi bi-trash icon-red fs-4" aria-hidden="true" ></i></button>
                      </form>
                   </div>
                   </div>
                     </td>
                     </tr>
                     @endforeach
                </tbody>
             </table>
          </div>
 
   <div class="container " style="margin-top:5rem">
      <div class="d-flex justify-content-center align-items-center ">
          <h5>{{ $users->links() }}</h5>
      </div>
    </div>
   </div>
  {{-- end of item list container --}}