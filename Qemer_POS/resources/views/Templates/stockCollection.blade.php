{{-- start of collabsable  list  --}}
<div class="home_content" style="float:right; padding-right:-100rem !important;">
    <div class="container" style="margin-top:2rem">
   
    </div>
 
   <livewire:stock-collection />
 </div>
 
 <script>

   // const element = document.getElementById('search_all')

   // // always checking if the element is clicked, if so, do alert('hello')
   // element.addEventListener("click", () => {
   //    window.location = '/collection?page=1';
   // });

   if(location.href.split('localhost.8000')[1] === "/collection?page=2") {
      window.location = '/collection?page=1';
}

//    // Simulate a mouse click:
// window.location.href = "http://www.w3schools.com";

// // Simulate an HTTP redirect:
// window.location.replace("http://www.w3schools

$(document).ready(function() {
      if (window.location.pathname == '/collection?page=2') {
         //  $("#button1").click(function(){
         //    //do something
         //  })
         window.location = '/collection?page=1';
      // }else if(window.location.pathname == '/alert.php'){
      //      $("#mytextfield").hover(){
      //        alert('message');
      //      }
    }
})

 </script>