{{-- start of collabsable  list  --}}
<div class="home_content style">
   <div class="container">
     
         @if ($message = Session::get('error'))
         <div class="alert alert-danger">
         <strong>   
            <h6>{{ $message }}</h6>
         </strong>
         </div>
      @endif    
   </div>

  <livewire:stock />
</div>