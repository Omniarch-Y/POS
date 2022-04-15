

{{-- start of item list container --}}
<div class="container">
    <div class="container col-md-6">
       <input type="text"  class="form-control" placeholder="Search..." wire:model="searchTerm" style="margin-top:2rem;"/>
    </div>
    <div class="row justify-content-md-evenly justify-content-lg-center align-items-center">
  @foreach($stocks as $stock)
   
  <div class="col-md-5 col-lg-3 ">
     <form action="{{ url('storeCart') }}" method="POST">
        @csrf
        <center>
                 <div class="card my-5 bg-light shadow" style="width:15rem;">
                   <img src="{{ asset('storage/itemImages/'.$stock->image) }}" alt="" class="mx-auto mt-3" style="border-radius:10px;width: 10rem; height:10rem">
                   <p class="mx-auto fs-6 ">{{$stock->name}}</p>
                   <p class="mx-auto fs-6">{{$stock->price}} ETB</p>
               <div>
                  <a class="btn dec" type="submit" ><i class="bi fs-5 bi-dash-circle-fill"></i></a>
                  <input type="number" class="text-center" id="amountX" name="amount" value='0' readonly/>
                  <a class="btn inc" type="submit" ><i class="bi fs-5 bi-plus-circle-fill"></i></a>
              </div>
  
               <input type="hidden" id ="price" name="price" value='{{$stock->price}}'>
  
               <input type="hidden" id ="stock_id" name="stock_id" value='{{$stock->id}}'>
  
            <button type="submit" class="btn btn-primary mx-auto my-2 ">Add to cart</button>
         </div>
        </center>
       
        </form>
  </div>
  @endforeach 
  <div class="container " style="margin-top:5rem">
     <div class="d-flex justify-content-center align-items-center ">
         <h5>{{ $stocks->links() }}</h5>
     </div>
   </div>
  </div>
  </div>
 {{-- end of item list container --}}