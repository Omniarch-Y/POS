
{{-- start of item list container --}}
<div class="container">
   <div class="container">
      <div class="row">
         <div class=" col-md-6">
         <strong>    
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <h1>{{ $message }}</h1>
                </div>
               @endif     
        </strong>

        <strong>    
                @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <h1>{{ $message }}</h1>
                </div>
               @endif     
        </strong>
    
       <input type="text" class="form-control" id="search_all" placeholder="Search..." wire:model="search" style="margin-top:2rem; margin-left:10rem;"/>
    </div>
    <div class="col-md-6">
        <button class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#addItem"  style="margin-top:2rem; margin-left:10rem; margin-right:1rem;">Add new Item</button>
        <button class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#addCategorys"   style="margin-top:2rem;margin-left:0rem;">Add new Category</button>
     
    </div>
   </div>
   </div>
    @extends('Templates.Modals.addNewItem')
    @extends('Templates.Modals.addCategories')


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

    <center class="mt-2">
        <div class="row mx-auto justify-content-center align-items-center ">
        <div class=" mx-0 px-0 row justify-content-center align-items-center">
            <div class="col-md-2" style="margin-top:1rem;">
            <div class="bg-success" style="width:10px;height:10px"> </div>
            <p>Enough items available</p>
        </div>
    
        <div class="col-md-2" style="margin-top:1rem;">
            <div class="bg-warning" style="width:10px;height:10px"> </div>
            <p>Item is running out</p>
        </div>
    
        <div class="col-md-2" style="margin-top:1rem;">
            <div class="bg-danger" style="width:10px;height:10px"> </div>
            <p>Item run out!!</p>
        </div>
        </div>
        </div>
    </center>
    
    <div class="row justify-content-md-evenly justify-content-lg-center align-items-center container">
  
            <table class="table table-responsive table-hover table-light my-5">
               <thead>
                  <tr>
                     <th scope="col">Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Stock amount</th>
                     <th scope="col">Catagory</th>

                  </tr>
               </thead>
               <tbody>

                     @foreach($stockCollection as $stock)
                     <tr>
                     <td>{{$stock->name}}</td>
                     <td>{{$stock->price}}Br</td>
                     @if ($stock->total_amount>10)
                     <td class="text-success"><strong>{{$stock->total_amount}}</strong></td>
                     @endif
                     @if ($stock->total_amount>0 && $stock->total_amount<=10)
                  <td class="text-warning"> <strong>{{$stock->total_amount}}</strong> </td>
                     @endif
                     @if ($stock->total_amount<=0)
                   <td class="text-danger"><strong>Item run-out of stock</strong></td>
                     @endif
                     <td>{{$stock->category_name}}</td>
                     <td>
                        <div class="row">
                           <div class="col-sm-4">
                        <a href ="{{ url('edit/'.$stock->id) }}"type="submit" class="btn"><i class="bi bi-pencil-square icon-green fs-4" aria-hidden="true" ></i></a>
                     </div>
                     <div class="col-sm-4">
                        <form action="{{ url('deleteStock'.'/'.$stock->id) }}"  method="POST" accept-charset="UTF-8">  
                           @csrf
                           @method('DELETE')
                        <button type="submit" class="btn" onClick = "return confirm('Are you sure you want to continue?')"><i class="bi bi-trash icon-red fs-4" aria-hidden="true" ></i></button>
                     </form>
                  </div>
                  </div>
                    </td>
                    </tr>
                    @endforeach
               </tbody>
            </table>
         </div>

  <div class="container " style="margin-top:1rem">
     <div class="d-flex justify-content-center align-items-center ">
         <h5>{{ $stockCollection->links() }}</h5>
     </div>
   </div>
  </div>
 {{-- end of item list container --}}