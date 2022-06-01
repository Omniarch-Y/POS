
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
   </div>
   </div> 
  <center>
   <div class="row mx-auto justify-content-center align-items-center ">
   <center> <div class="container col-md-6">
       <input type="text"  class="form-control" placeholder="Search..." wire:model="search" style="margin-top:2rem;"/>
    </div>
   </center>
    <div class="mx-0 px-0 row justify-content-center align-items-center">
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
  
            <table class="table table-responsive table-hover table-light my-5">
               <thead>
                  <tr>
                     <th scope="col">
                        Name
                        {{-- <span wire:click="sortBy('name') class="float-right text-sm" style="cursor: pointer;">
                           <i class="bi bi-arrow-up text-muted"></i>
                           <i class="bi bi-arrow-down"></i>
                        </span> --}}
                     </th>
                     <th scope="col">Price</th>
                     <th scope="col">Stock amount</th>
                     @if (auth()->user()->role == 'casher')
                     <th scope="col">Amount</th>
                     <th scope="col">Add to cart</th>
                     @endif
              
                  </tr>
               </thead>
               <tbody>

                     @foreach($stocks as $stock)
                     <tr>
                     <form action="{{ url('storeCart') }}" method="POST">
                        @csrf
                     <td>{{$stock->name}}</td>
                     <td>{{$stock->price}}Br</td>
                     @if ($stock->total_amount>10)
                     <td class="text-success"><strong>{{$stock->total_amount}}</strong></td>
                     @endif
                     @if ($stock->total_amount>0 && $stock->total_amount<=10)
                  <td class="text-warning"> <strong>{{$stock->total_amount}}</strong> </td>
                     @endif
                     @if ($stock->total_amount<=0)
                   <td class="text-danger"><strong>{{$stock->total_amount}}</strong> </td>
                   <td class="text-danger"><strong>Item run-out of stock</strong></td>
                     @endif
                     @if ($stock->total_amount>0)
                            
                     @if (auth()->user()->role=='casher')
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
                       <button type="submit" class="btn btn-primary mx-auto my-1"><i class="bi bi-cart-plus-fill fs-5" aria-hidden="true" ></i></button>
                    </td>
                     @endif
                    
                     @endif
                
                    </form>
                    </tr>
                    @endforeach


               </tbody>
            </table>
         </div>

  <div class="container">
     <div class="d-flex justify-content-center align-items-center ">
         <h5>{{ $stocks->links() }}</h5>
     </div>
   </div>
  </div>
 {{-- end of item list container --}}