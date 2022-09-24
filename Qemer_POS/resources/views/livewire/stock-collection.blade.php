
{{-- start of item list container --}}
{{-- <div class="container">
   <div class="container">
      <div class="row">
         <center>
            <div class="col-md-6 center_text">
            <strong>    

                  @if ($message = Session::get('success'))
                     <script>
                       swal({!! Session::get('success') !!});
                       Swal.fire('Any fool can use a computer');
                     </script>
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
      <div class="col-md-6">
         <input type="text" class="form-control" id="search_all" placeholder="Search..." wire:model="search" style="margin-top:2rem; margin-left:10rem;"/>
      </div>   
       
    <div class="col-md-6">
        <button class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#addItem" style="margin-top:2rem; margin-left:10rem; margin-right:1rem;">Add new Item</button>
        <button class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#addCategorys" style="margin-top:2rem;margin-left:0rem;">Add new Category</button>
    </div>
   </div>
   </div>

    <center class="mt-2">
        <div class="row mx-auto justify-content-center align-items-center ">
        <div class=" mx-0 px-0 row justify-content-center align-items-center">
            <div class="col-md-2" style="margin-top:1rem;">
            <div class="bg-success" style="width:10px;height:10px"> </div>
            <p>Enough items available</p>
        </div>
    
        <div class="col-md-2" style="margin-top:1rem;">
            <div class="bg-warning" style="width:10px;height:10px"> </div>
            <p>Item is running out</p>
        </div>
    
        <div class="col-md-2" style="margin-top:1rem;">
            <div class="bg-danger" style="width:10px;height:10px"> </div>
            <p>Item run out!!</p>
        </div>
        </div>
        </div>
    </center>

    <div class="row justify-content-md-evenly justify-content-lg-center align-items-center container">
  
            <table class="table table-responsive table-hover my-5">
               <thead>
                  <tr>
                     <th scope="col">Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Stock amount</th>
                     <th scope="col">Catagory</th>
                     <td></td>

                  </tr>
               </thead>
               <tbody>

                     @foreach($stockCollection as $stock)
                     <tr>
                     <td>{{$stock->name}}</td>
                     <td>{{$stock->price}}Br</td>
                     @if ($stock->total_amount>10)
                     <td class="text-success"><strong>{{$stock->total_amount}}</strong></td>
                     @endif
                     @if ($stock->total_amount>0 && $stock->total_amount<=10)
                  <td class="text-warning"> <strong>{{$stock->total_amount}}</strong> </td>
                     @endif
                     @if ($stock->total_amount<=0)
                   <td class="text-danger"><strong>Item run-out of stock</strong></td>
                     @endif
                     <td>{{$stock->category_name}}</td>
                     <td>
                        <div class="row">
                           <div class="col-sm-4">
                        <a href ="{{ url('edit/'.$stock->id) }}"type="submit" class="btn"><i class="bi bi-pencil-square icon-green fs-4" aria-hidden="true" ></i></a>
                     </div>
                     <div class="col-sm-4">
                        <form action="{{ url('deleteStock'.'/'.$stock->id) }}"  method="POST" accept-charset="UTF-8">  
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

  <div class="container " style="margin-top:1rem">
     <div class="d-flex justify-content-center align-items-center ">
         <h5>{{ $stockCollection->links() }}</h5>
     </div>
   </div>
  </div> --}}



  <div class="container mt-5">
   <div class="row">
       <div class="col-md-12">

         <center class="mt-2">
            <div class="row mx-auto justify-content-center align-items-center ">
            <div class=" mx-0 px-0 row justify-content-center align-items-center">
                <div class="col-md-2" style="margin-top:1rem;">
                <div class="bg-success" style="width:10px;height:10px"> </div>
                <p>Enough items available</p>
            </div>
        
            <div class="col-md-2" style="margin-top:1rem;">
                <div class="bg-warning" style="width:10px;height:10px"> </div>
                <p>Item is running out</p>
            </div>
        
            <div class="col-md-2" style="margin-top:1rem;">
                <div class="bg-danger" style="width:10px;height:10px"> </div>
                <p>Item run out!!</p>
            </div>
            </div>
            </div>
        </center>

           <div class="card mt-5">
               <div class="card-header">

                       <input type="text" class="form-control form-control-sm" placeholder="Search" wire:model="search" style="max-width:20rem; float:left">

                   <button class="btn btn-sm btn-outline-primary ms-3" data-bs-toggle="modal" data-bs-target="#addItem" style="float: right;">Add new Item</button>
                   <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addCategorys" style="float: right;">Add new Category</button>
 
               </div>

               <div class="card-body">
                   {{-- <div> --}}
                       @if (session()->has('message'))
                       <center>
                           <div class="alert alert-success text-center col-sm-6">
                               {{ session('message') }}
                           </div>
                       </center>
                       @endif
                   {{-- </div> --}}


                   <table class="table table-hover mt-5">
                       <thead class="thead-inverse|thead-default">
                          <tr>
                             <th></th>
                             <th scope="col">Name</th>
                             <th scope="col">Price</th>
                             <th scope="col">Amount</th>
                             <th scope="col">Catagory</th>
                          </tr>
                       </thead>
                       <tbody>
                        @foreach($stockCollection as $stock)
                        <tr>
                        <!-- <td scope="row"><img src="{{ Storage::url($stock->image) }}" style="max-width:3rem;min-height:3rem;"></td> -->
                        <td scope="row"><img src="{{ asset('storage/itemImages/'.$stock->image) }}" alt="item image" style="max-width:5rem;min-height:3rem;"></td>
                        <td>{{$stock->name}}</td>
                        <td>{{$stock->price}}Br</td>
                        @if ($stock->total_amount>10)
                        <td class="text-success"><strong>{{$stock->total_amount}}</strong></td>
                        @endif
                        @if ($stock->total_amount>0 && $stock->total_amount<=10)
                     <td class="text-warning"> <strong>{{$stock->total_amount}}</strong> </td>
                        @endif
                        @if ($stock->total_amount<=0)
                      <td class="text-danger"><strong>Item run-out of stock</strong></td>
                        @endif
                        <td>{{$stock->category_name}}</td>
                        <td>
                           <div class="row">
                              <div class="col-sm-4">
                           <a href ="{{ url('edit/'.$stock->id) }}"type="submit" class="btn"><i class="bi bi-pencil-square icon-green fs-4" aria-hidden="true" ></i></a>
                        </div>
                        <div class="col-sm-4">
                           <form action="{{ url('deleteStock'.'/'.$stock->id) }}"  method="POST" accept-charset="UTF-8">  
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
                    <div class="container " style="margin-top:1rem">
                       <div class="d-flex justify-content-center align-items-center ">
                           <h5>{{ $stockCollection->links() }}</h5>
                    </div>
                </div>
            </div>
        </div>
     </div>
  </div>
</div>
 {{-- end of item list container --}}