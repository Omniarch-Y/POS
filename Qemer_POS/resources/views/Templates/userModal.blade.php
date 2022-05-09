<div class="modal fade" id="wee" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
        <div class="modal-content container">
            <div class="modal-header">
                <h5 class="text-center modal-title">User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

               <center>
                   {{-- <div class="card"> --}}
                    <img src="{{ asset('storage/userImages/'.auth()->user()->avatar) }}" alt="" class="mx-auto mt-3" style="border-radius:10px;width: 10rem; height:10rem">
                   {{-- </div> --}}
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
                    {{-- <button type="submit" class=" mx-auto btn btn-primary">Change Password</button> --}}
                    <a  class="mx-auto btn btn-primary" href="{{ route('login') }}">Changed Password</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>