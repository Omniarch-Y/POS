// js for sidebar
let btn = document.querySelector('#btn_toggler');
let sidebar = document.querySelector('.sidebar');

btn.onclick = function() {
   sidebar.classList.toggle("active");
}
//end of js for sidebar


// js for item list
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
// end of js for item list

// js for printForm
function printFunction() {
    window.print();
  }
// end of js for printForm

// js for stock-collection and user livewire
var modelId = document.getElementById('modelId');

   modelId.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');

      // Use above variables to manipulate the DOM
   });
// end of js for stock-collection and user livewire


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
   'use strict'
 
   // Fetch all the forms we want to apply custom Bootstrap validation styles to
   var forms = document.querySelectorAll('.needs-validation')
 
   // Loop over them and prevent submission
   Array.prototype.slice.call(forms)
     .forEach(function (form) {
       form.addEventListener('submit', function (event) {
         if (!form.checkValidity()) {
           event.preventDefault()
           event.stopPropagation()
         }
 
         form.classList.add('was-validated')
       }, false)
     })
 })()
 