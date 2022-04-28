

{{-- start of item list container --}}
<div class="container">
      <div class=" container col-md-6">
       <input type="text" class="form-control" placeholder="Search..." wire:model="search" style="margin-top:2rem;"/>
    </div>
    <div class="row">
    <div class=" container col-md-6">
        <button class="btn btn-primary"  style="margin-top:2rem;">Add new Item</button>
    </div>
   </div>
    
    <div class="row justify-content-md-evenly justify-content-lg-center align-items-center container">
  
            <table class="table table-responsive table-hover table-light my-5">
               <thead>
                  <tr>
                     <th scope="col">Id</th>
                     <th scope="col">Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Stock amount</th>
                     <th scope="col">Catagory</th>

                  </tr>
               </thead>
               <tbody>

                     @foreach($stockCollection as $stock)
                     <tr>

                     <th scope="row">{{$stock->id}}</th>
                     <td>{{$stock->name}}</td>
                     <td>{{$stock->price}}</td>
                     <td>{{$stock->total_amount}}</td>
                     <td>{{$stock->category_name}}</td>
                     <td>
                        <div class="row">
                           <div class="col-sm-4">
                        <a href ="{{ url('/editView'.'/'.$stock->id) }}"type="submit" class="btn"><i class="bi bi-pencil-square icon-green fs-4" aria-hidden="true" ></i></a>
                     </div>
                     <div class="col-sm-4">
                        <form action="{{ url('/deleteStock'.'/'.$stock->id) }}"  method="POST" accept-charset="UTF-8">  
                           @csrf
                           @method('DELETE')
                        <button type="submit" class="btn"><i class="bi bi-trash icon-red fs-4" aria-hidden="true" ></i></button>
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
         <h5>{{ $stockCollection->links() }}</h5>
     </div>
   </div>
  </div>
 {{-- end of item list container --}}