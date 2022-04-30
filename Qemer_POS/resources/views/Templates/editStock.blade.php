 
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
                <div class="card-header text-white text-center justify-content-center align-items-center  "style="background-color:orange;">{{ __('Stock maintaining form') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('updateItem/'.$stock->id) }} " enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="form-group row py-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Item Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Enter the product name')}}" value={{$stock->name}} required autocomplete="name" autofocus required>

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
                                <input id="total_amount" placeholder="{{ __('Enter how many numbers in stock it will have') }}" type="number" class="form-control @error('total_amount') is-invalid @enderror" name="total_amount" value={{$stock->total_amount }} autocomplete="total_amount" required>

                                @error('total_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
   
                        <div class="form-group row mb-3">    
                        <label for="Catagory" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-6  ">
                                     <select class="form-control" id="role" name="category_id" required focus>
                                         @foreach ($categories as $category)       
                                         <option value="{{ $category->c_id }}" selected>{{ $category->category_name }}</option>        
                                         @endforeach
                                         <option value="Select Role" disabled selected>Click to Select Category</option>       
                                     </select>
                                </div>
                       </div>

                        <div class="form-group row py-3">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
                            <div class="col-md-6">
                          <input name="image"   type="file" class="form-control" value={{$stock->image}} required>
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
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" autocomplete="price" placeholder="{{ __('Enter the price in ETB') }}  " value={{$stock->price}} required>

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
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
 </div>