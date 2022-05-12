

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

<!-- Start of Modal for adding new Item -->
<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
            <div class="modal-header justify-content-center">
<center><h2 class="modal-title text-dark text-center "style=" justify-content-center">{{ __('Product managment form') }}</h2></center>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
         <div class="modal-body">
            <div class="container-fluid">
                    <form method="POST" action="{{'storeItem'}} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row py-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Item Name') }}</label>
                            <div class="col-md-6">
                                <input id="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Enter the product name')}}"  required autocomplete="name" autofocus required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-3">
                            <label for="total_amount" class="col-md-4 col-form-label text-md-right">{{ __('Total amount in stock') }}</label>

                            <div class="col-md-6">
                                <input id="total_amount"  placeholder="{{ __('Enter how many numbers in stock it will have') }}" type="number" class="form-control @error('total_amount') is-invalid @enderror" name="total_amount" value="{{ old('total_amount') }}" autocomplete="total_amount" required>

                                @error('total_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-group row mb-3">    
                        <label for="total_amount" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-6  ">
                                     <select class="form-control  " id="role" name="category" required focus>
                                         @foreach ($categories as $category)       
                                         <option value="{{ $category->c_id }}"  selected>{{ $category->category_name }}</option>        
                                         @endforeach
                                         <option value="Select Role"  disabled selected>Click to Select Category</option>       
                                     </select>
                                </div>
                       </div>

                        <div class="form-group row py-3">
                            <label for="image"  class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
                            <div class="col-md-6">
                          <input name="image"   type="file" class="form-control"  required >
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-3">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price"  type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" placeholder="{{ __('Enter the price in ETB') }}  " required>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                        </div>
                  
             
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary ">
               {{ __('Insert Product') }}
           </button>
         </div>
      </form>
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
            <center><h2 class="modal-title text-dark text-center "style=" justify-content-center">{{ __(' Category management form') }}</h2></center>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
         <div class="modal-body">
            <div class="container-fluid">
               <form method="POST" action="{{'addCategories'}}">
                  @csrf
                  <div class="form-group row py-3">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                      <div class="col-md-6">
                          <input id="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="{{ __('Enter category name') }}  " required>
                  </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary ">
               {{ __('Add Category') }}
           </button>
         </div>
      </form>
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
                     <td>{{$stock->total_amount}}</td>
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

  <div class="container " style="margin-top:5rem">
     <div class="d-flex justify-content-center align-items-center ">
         <h5>{{ $stockCollection->links() }}</h5>
     </div>
   </div>
  </div>
 {{-- end of item list container --}}