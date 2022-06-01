<!-- Start of Modal for adding new Category -->
<div class="modal fade" id="addCategorys" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
             <div class="modal-header">
                  <center>
                     <h2 class="modal-title text-dark text-center "style=" justify-content-center">{{ __(' Category management form') }}</h2>
                  </center>
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
 <!--End of Modal for adding new Category -->