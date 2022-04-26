{{-- start of catagories list  --}}
    <div class="home_content" style="float:right; padding-right:-100rem !important;">
      <div class="bg-white" >
        <div class="card mt-4" style="margin-left:20px; margin-right:20px; border-radius:20px;">
           <strong>
                        
              @if ($message = Session::get('error'))
              <div class="alert alert-danger">
                  <h6>{{ $message }}</h6>
              </div>
             @endif
                   
              </strong>
          
          <div class="row justify-content-center justify-content-evenly mt-4">

           @forelse ($categories as $category )
                  <a class="btn btn-success" style="width:120px !important;" href="{{ url('sortList', $category->id) }}">{{ $category->name}}</a>
           @empty
              <h3>Sorry there are no catagories</h3>
           @endforelse
  
           {{-- <div class="row justify-content-center mt-4 mb-4">
                          
              <div class="col-sm-8">
                  <input type="text" class="form-control" style="width:400px;">
              </div>
              <div class="col-sm-4">
                  <button class="btn btn-secondary"><i class="bi bi-search" aria-hidden="true"></i></button>
              </div>
          
      </div> --}}
  
      @foreach($stocks as $stock)
      <form action="{{ url('storeCart') }}" method="POST">
        @csrf
         <div class="col-md-3 text-center">
             <div class="card bg-light shadow" style="width:15rem;">
                   <img src="{{ asset('storage/itemImages/'.$stock->image) }}" alt="" class="mx-auto mt-3" style="border-radius:10px;width: 10rem; height:10rem">
                   <p class="mx-auto fs-5 ">Price: {{$stock->price}}ETB</p>
                </div>

               <div>
                  <a class="btn dec" type="submit" ><i class="bi bi-dash-circle-fill"></i></a>
                  <input type="number" id="amountX" name="amount" value='0' readonly/>
                  <a class="btn inc" type="submit" ><i class="bi bi-plus-circle-fill"></i></a>
              </div>
  
               <input type="hidden" id ="price" name="price" value='{{$stock->price}}'>
  
               <input type="hidden" id ="stock_id" name="stock_id" value='{{$stock->id}}'>
  
            <button type="submit" class="btn btn-primary mx-auto ">Add to cart</button>
         </div>
        </form>
         @endforeach
         
          </div>
        </div>
     </div>
   </div>

  <!-- //modal for storing a new category -->
 
 <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
     <div class="modal-dialog modal-md modal-scrollable" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class=" text-center modal-title">Cart</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
             <form method="POST" action="{{'cashOut'}}">
               <table class="table   table-responsive">
                  <thead class="thead-inverse|thead-default">
                     <tr>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Price</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($informations as $info )
                     <tr>
                      
                        <td scope="row">{{ $info->item->name }}</td>
                        <td>{{ $info->amount }}</td>
                        <td>{{$info->total_price }}</td>
                     </tr>
                    
                     @endforeach
                    
                  </tbody>
               </table>
               <div class="container ">
                   <div class="d-flex justify-content-center align-items-center ">
                       
                       <strong><p style="color:rgb(0, 241, 32);" class="    text-center display-4">{{ $totalItemPrice  }}</p></strong> 
                        <p class=" text-dark   text-center display-4 ">-ETB</p>
               </div>
               </div>
               <div class="container">
                  <div class="row align-items-center justify-content-center ">
                     <button class=" mx-auto btn btn-success">Submit</button>
                     <button  class=" mx-auto btn btn-danger" onclick="printFunction()">Print</button>

                  </div>
               </div>
             </form>
           </div>       
       </div>
    </div>
</div>

<script>

   // incrementVar = 0;
   //    $('.inc').click(function(){
   //       var $this = $(this),
   //          $input = $this.prev('input'),
   //          $parent = $input.closest('div'),
   //          newValue = parseInt($input.val())+1;
   //       $parent.find('.inc').addClass('a'+newValue);
   //       $input.val(newValue);
   //       incrementVar += newValue;
   //    });
   //    $('.dec').click(function(){
   //       var $this = $(this),
   //          $input = $this.next('input'),
   //          $parent = $input.closest('div'),
   //          newValue = parseInt($input.val())-1;
   //          if(newValue < 0){
   //          newValue = newValue * 0; 
   //          }
   //       $parent.find('.inc').addClass('a'+newValue);
   //       $input.val(newValue);
   //       incrementVar += newValue;
   //    });

      $(".inc").click(function() {
         updateValue(this, 1);
      });
      $(".dec").click(function() {
         updateValue(this, -1);
      });

      function updateValue(obj, delta) {
         var item = $(obj).parent().find("input");
         var newValue = parseInt(item.val(), 10) + delta;
         item.val(Math.max(newValue, 0));
      }
   
</script>