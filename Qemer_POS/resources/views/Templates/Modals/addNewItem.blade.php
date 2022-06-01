<!-- Start of Modal for adding new Item -->
<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
             <div class="modal-header justify-content-center">
                <center>
                    <h2 class="modal-title text-dark text-center "style=" justify-content-center">{{ __('Product managment form') }}</h2>
                </center>
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
   
                         <div class="form-group row py-3">    
                         <label for="total_amount" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                                 <div class="col-md-6  ">
                                      <select class="form-control" id="role" name="category" required focus>
                                          @foreach ($categories as $category)       
                                          <option value="{{ $category->c_id }}" selected>{{ $category->category_name }}</option>        
                                          @endforeach
                                          <option value="Select Role"  disabled selected>Click to Select Category</option>       
                                      </select>
                                 </div>
                        </div>
 
                         <div class="form-group row py-3">
                             <label for="image"  class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
                             <div class="col-md-6">
                           <input name="image" type="file" class="form-control" required >
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
 <!--End of Modal for adding new Item -->