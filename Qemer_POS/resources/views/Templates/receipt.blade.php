
   
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
        
         <form action= "{{ url('anyReceipt')}}"  method="GET" class="d-flex">
            @csrf
            
            <input class="form-control me-2 fs-5" name="date" type="date">
            <button class="btn bi bi-search fs-5 text-white" type="submit" style="background-color:rgb(0, 84, 137) "></button>
          </form>
     </div>
     {{-- end of search-bar --}}
     <div class="container " style="margin-top:5rem">
      <div class="thead-inverse|thead-default d-flex justify-content-center align-items-center ">
          <h2 >Receipt number</h2>
  </div>
  </div>
     
                      <div class="container my-3">
                           <div class="row justify-content-center border align-items-center">
                              
                              @foreach ($receiptNo as $info )
                              <div class="col-md-3">
                              <td class="text-center mt-3 "><a class="btn btn-success" href="{{'receipt/' . $info->receipt_number }}"> <h4>{!! $info->receipt_number  !!}</h4>  </a></td>
                              </div>
                              @endforeach
                             
                           </div>
                        </div>
               <div class="container " style="margin-top:5rem">
                <div class="d-flex justify-content-center align-items-center ">
                    <h4 >{{ $receiptNo->links() }}</h4>
            </div>
            </div>
             
    </center>
      {{-- end of row from sidebar --}}
    </div>
   </div>
     