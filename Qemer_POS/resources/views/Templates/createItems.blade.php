 
@extends('layouts.app')
@section('content')

<div class="container my-5"style="">
    <div class="row align-items-center ">
        <div class="col-md-8 mx-auto ">
            <strong>
                
                    
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <h1>{{ $message }}</h1>
            </div>
           @endif

           
                 
            </strong>

            
           <div class=" card ">
                <div class="card-header text-white text-center justify-content-center align-items-center  "style="background-color:orange;">{{ __('Product managment form') }}</div>
                <div class="card-body">
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
                                         <option value="Select Role" disabled selected>Click to Select Category</option>       
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
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 justify-content-center text-center align-items-center my-3">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Insert Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="col justify-content-center align-items-center text-center">
    <button type="" name="" data-bs-toggle="modal" data-bs-target="#addCategory" class="btn btn-primary  fs-2">Add a new category</button>
    </div>
</div>


@endsection
 
 <!-- //modal for storing a new category -->
 
 <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
     <div class="modal-dialog modal-sm|lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">sm|lg</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 
             </div>
             <div class="modal-body">
             <form method="POST" action="{{'addCategories'}}">
                        @csrf
 

                        <div class="form-group row py-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="{{ __('Enter category name') }}  " required>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                        </div>
                         
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 justify-content-center text-center align-items-center my-3">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Add Category') }}
                                </button>
                            </div>
                        </div>
                    </form>
             </div>
             
                
             </div>
         </div>
     </div>
 </div>
 