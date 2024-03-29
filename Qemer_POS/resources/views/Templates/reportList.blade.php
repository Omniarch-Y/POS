
    <div class="home_content" style="float:right; padding-right:-100rem !important;">
      <div class="container">
    <center> 
       <div class="my-5 col-md-6">
   @if ($message = Session::get('error'))
            <div class="alert alert-danger center_text">
                <h4>{{ $message }}</h4>
            </div>
           @endif    
            </strong>
       </div>
       <strong>    
         
          {{-- start of search-bar --}}
      <div class="container col-md-6">
         <form action= "{{ url('anyReport')}}" method="GET" class="d-flex">
            @csrf
            
            <input class="form-control me-2 fs-5" name="date" type="date">
            <button class="btn bi bi-search text-white" type="submit" style="background-color:rgb(0, 84, 137);"></button>
          </form>
     </div>
     {{-- end of search-bar --}}
    <table class="table table-responsive table-hover" style="margin-top:4rem;">
                  <thead class="thead-inverse|thead-default">
                     <tr>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Fs</th>
                        <th>Status</th>
                        <th>Date</th>     
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($soldItems as $soldItem )
                     <tr>
                      
                        <td scope="row">{{ $soldItem->item->name }}</td>
                        <td>{{ $soldItem->amount }}</td>
                        <td>{{$soldItem->total_price }}</td>
                        <td>{{$soldItem->rno }}</td>
                        <td>Sold</td>
                        <td>{{$soldItem->created_at->format('d-m-Y') }}</td>
                     </tr>
                    
                     @endforeach
                    
                  </tbody>
               </table>
               <div class="container" style="margin-top:5rem">
                  <div class="d-flex justify-content-center align-items-center ">
                      <h4 >{{ $soldItems->links() }}</h4>
              </div>
              </div>
             
               <div class="container" style="margin-top:5rem">
                <div class="d-flex justify-content-center align-items-center ">
                    <p class=" text-dark display-6">Today's earning:</p>
                    <strong><p style="color:rgb(0, 241, 32);" class="display-6">{{ $cash  }}</p></strong> 
                     <p class=" text-dark display-6">-ETB</p>
            </div>
            </div>
      
    </center>
      {{-- end of row from sidebar --}}
    </div>
   </div>
     