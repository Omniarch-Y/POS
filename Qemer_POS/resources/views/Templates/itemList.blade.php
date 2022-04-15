{{-- start of collabsable  list  --}}
<div class="home_content   " style="float:right; padding-right:-100rem !important;">
   <div class="container " style="margin-top:2rem">
      <strong>    
         @if ($message = Session::get('error'))
         <div class="alert alert-danger">
            <h1>{{ $message }}</h1>
         </div>
      @endif    
         </strong>
   </div>

  <livewire:stock />
</div>

<script>

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