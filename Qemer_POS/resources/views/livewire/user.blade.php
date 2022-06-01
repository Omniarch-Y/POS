
{{-- start of item list container --}}
<div class="container">
    <div class="container">
       <div class="row">
          <div class="col-sm-12 center_text">
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
          <div class="col-sm-6">
        <input type="text" class="form-control" id="search_all" placeholder="Search..." wire:model="search" style="margin-top:2rem; margin-left:10rem;"/>
     </div>
     <div class="col-sm-6">
         <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addUser" style="margin-top:2rem; margin-left:10rem; margin-right:1rem;"><i class="bi bi-person-plus-fill fs-6" aria-hidden="true" ></i></button> 
     </div>
    </div>
    </div>
 
    @extends('Templates.Modals.registerUser')
 
     <div class="row justify-content-md-evenly justify-content-lg-center align-items-center container">
   
             <table class="table table-responsive table-hover my-5">
                <thead>
                   <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone number</th>
                      <th scope="col">Role</th>
 
                   </tr>
                </thead>
                <tbody>
 
                      @foreach($users as $user)
                      <tr>
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
 
   <div class="container" style="margin-top:5rem">
      <div class="d-flex justify-content-center align-items-center ">
          <h5>{{ $users->links() }}</h5>
      </div>
    </div>
   </div>
  {{-- end of item list container --}}