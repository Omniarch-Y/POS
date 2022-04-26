
   
    <div class="home_content" style="float:right; padding-right:-100rem !important;">
      <div class="container">
    <center> 
       <div class="container my-5 col-md-8">
   @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <h6>{{ $message }}</h6>
            </div>
           @endif    
            </strong>
       </div>
       <strong>    
         
          {{-- start of search-bar --}}
      <div class="container col-md-6 " style="margin-top:2rem">
         <form action= "{{ url('anyReport')}}"  method="GET" class="d-flex">
            @csrf
            
            <input class="form-control me-2 fs-5" name="date" type="date">
            <button class="btn bi bi-search fs-5 text-white" type="submit" style="background-color:rgb(0, 84, 137) "></button>
          </form>
     </div>
     {{-- end of search-bar --}}
    <table class="table table-responsive" style="margin-top:4rem">
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
                     @foreach ($informations as $info )
                     <tr>
                      
                        <td scope="row">{{ $info->item->name }}</td>
                        <td>{{ $info->amount }}</td>
                        <td>{{$info->total_price }}</td>
                        <td>{{$info->rno }}</td>
                        <td>Sold</td>
                        <td>{{$info->created_at->format('d-m-Y') }}</td>
                     </tr>
                    
                     @endforeach
                    
                  </tbody>
               </table>
               <div class="container " style="margin-top:5rem">
                <div class="d-flex justify-content-center align-items-center ">
                    <h4 >{{ $informations->links() }}</h4>
            </div>
            </div>
             
               <div class="container " style="margin-top:5rem">
                <div class="d-flex justify-content-center align-items-center ">
                    <p class=" text-dark   display-6 ">Today's earning:</p>
                    <strong><p style="color:rgb(0, 241, 32);" class="display-6">{{ $cash  }}</p></strong> 
                     <p class=" text-dark display-6 ">-ETB</p>
            </div>
            </div>
      
    </center>
      {{-- end of row from sidebar --}}
    </div>
   </div>
     