

{{-- start of item list container --}}
<div class="container">
    <div class="container col-md-6">
       <input type="text"  class="form-control" placeholder="Search..." wire:model="searchTerm" style="margin-top:2rem;"/>
    </div>
    
    <div class="row justify-content-md-evenly justify-content-lg-center align-items-center container">
  
            <table class="table table-responsive table-hover table-light my-5">
               <thead>
                  <tr>
                     <th scope="col">Id</th>
                     <th scope="col">Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Stock amount</th>
                     <th scope="col">Amount</th>
                     <th scope="col">Add to cart</th>
                  </tr>
               </thead>
               <tbody>

                     @foreach($stocks as $stock)
                                       <tr>
                     <form action="{{ url('storeCart') }}" method="POST">
                        @csrf
                     <th scope="row">{{$stock->id}}</th>
                     <td>{{$stock->name}}</td>
                     <td>{{$stock->price}}</td>
                     <td>{{$stock->total_amount}}</td>
                     <td>
                        <div>
                           <a class="btn dec" type="submit" ><i class="bi fs-5 bi-dash-circle-fill"></i></a>
                           <input type="number" class="text-center" id="amountX" name="amount" value='0' readonly/>
                           <a class="btn inc" type="submit" ><i class="bi fs-5 bi-plus-circle-fill"></i></a>
                        </div>

                        <input type="hidden" id ="price" name="price" value='{{$stock->price}}'>
                        
                        <input type="hidden" id ="stock_id" name="stock_id" value='{{$stock->id}}'>
                    </td>
                    <td>
                       <button type="submit" class="btn btn-primary mx-auto my-2 ">Add to cart</button>
                    </td>
                  </form>
                                    </tr>
                    @endforeach


               </tbody>
            </table>
         </div>

  <div class="container " style="margin-top:5rem">
     <div class="d-flex justify-content-center align-items-center ">
         <h5>{{ $stocks->links() }}</h5>
     </div>
   </div>
  </div>
 {{-- end of item list container --}}