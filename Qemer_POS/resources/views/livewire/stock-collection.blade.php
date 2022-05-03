

{{-- start of item list container --}}
<div class="container">
   <div class="container">
      <div class="row">
         <div class=" col-md-6">
       <input type="text" class="form-control" placeholder="Search..." wire:model="search" style="margin-top:2rem; margin-left:10rem;"/>
    </div>
    <div class="col-md-6">
        <button class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#addItem"  style="margin-top:2rem; margin-left:10rem; margin-right:1rem;">Add new Item</button>
        <button class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#addCategorys"   style="margin-top:2rem;margin-left:0rem;">Add new Category</button>
     
    </div>
   </div>
   </div>

 

<!-- Start of Modal for adding new Item -->
<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
         <div class="modal-body">
            <div class="container-fluid">
               Add rows here
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
         </div>
      </div>
   </div>
</div>
<!--End of  Modal for adding new Item -->


<!-- Start of Modal for adding new Category -->
<div class="modal fade" id="addCategorys" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
         <div class="modal-body">
            <div class="container-fluid">
               Add rows here
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
         </div>
      </div>
   </div>
</div>
<!--End of  Modal for adding new Category -->

<script>
   var modelId = document.getElementById('modelId');

   modelId.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');

      // Use above variables to manipulate the DOM
   });
</script>

 
    
    <div class="row justify-content-md-evenly justify-content-lg-center align-items-center container">
  
            <table class="table table-responsive table-hover table-light my-5">
               <thead>
                  <tr>
                     <th scope="col">Id</th>
                     <th scope="col">Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Stock amount</th>
                     <th scope="col">Catagory</th>

                  </tr>
               </thead>
               <tbody>

                     @foreach($stockCollection as $stock)
                     <tr>

                     <th scope="row">{{$stock->id}}</th>
                     <td>{{$stock->name}}</td>
                     <td>{{$stock->price}}</td>
                     <td>{{$stock->total_amount}}</td>
                     <td>{{$stock->category_name}}</td>
                     <td>
                        <div class="row">
                           <div class="col-sm-4">
                        <a href ="{{ url('/editView'.'/'.$stock->id) }}"type="submit" class="btn"><i class="bi bi-pencil-square icon-green fs-4" aria-hidden="true" ></i></a>
                     </div>
                     <div class="col-sm-4">
                        <form action="{{ url('/deleteStock'.'/'.$stock->id) }}"  method="POST" accept-charset="UTF-8">  
                           @csrf
                           @method('DELETE')
                        <button type="submit" class="btn"><i class="bi bi-trash icon-red fs-4" aria-hidden="true" ></i></button>
                     </form>
                  </div>
                  </div>
                    </td>
                    </tr>
                    @endforeach
               </tbody>
            </table>
         </div>

  <div class="container " style="margin-top:5rem">
     <div class="d-flex justify-content-center align-items-center ">
         <h5>{{ $stockCollection->links() }}</h5>
     </div>
   </div>
  </div>
 {{-- end of item list container --}}