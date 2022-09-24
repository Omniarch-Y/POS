
{{-- start of item list container --}}
<div class="container">
    <div class="container">
       <div class="row">
         <center>
          <div class="col-md-6 center_text">
          <strong>    
                 @if ($message = Session::get('success'))
                 <div class="alert alert-success">
                     <h4>{{ $message }}</h4>
                 </div>
                @endif     
         </strong>
 
         <strong>    
                 @if ($message = Session::get('error'))
                 <div class="alert alert-danger">
                     <h4>{{ $message }}</h4>
                 </div>
                @endif     
         </strong>
          </div>
         </center>
          <center>
          <div class="col-sm-6 justify-content-center mt-5">
        <input type="text" class="form-control" id="search_all" placeholder="Search..." wire:model="search"/>
     </div>
   </center>
    </div>
    </div>
 
    {{-- @extends('Templates.Modals.registerUser') --}}
 
     <div class="row justify-content-md-evenly justify-content-lg-center align-items-center container">
   
             <table class="table table-hover mt-5">
                <thead class="thead-inverse|thead-default">
                   <tr>
                      <th></th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone number</th>
                      <th scope="col">Role</th>
 
                   </tr>
                </thead>
                <tbody>
 
                      @foreach($users as $user)
                      <tr>
                      <td scope="row"><img class="mb-6 ms-5" src="{{ asset('storage/userImages/'.$user->avatar) }}" alt="user image" style="max-width:3rem;min-height:3rem"></td>
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
 
   <div class="container" style="margin-top:3rem">
      <div class="d-flex justify-content-center align-items-center ">
          <h5>{{ $users->links() }}</h5>
      </div>
    </div>
   </div>
  {{-- end of item list container --}}