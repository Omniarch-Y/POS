 
@extends('layouts.app')
@section('content')

<div class="container my-5">
    <div class="row align-items-center ">
        <div class="col-md-8 mx-auto ">
            <strong>    
            @if ($message = Session::get('success'))
            <div class="alert alert-success center_text">
                <h4>{{ $message }}</h4>
            </div>
           @endif
            </strong>

        <div class="py-5 text-center">
            <i class="bi bi-pencil-square fs-1 icon-green" aria-hidden="true"></i>
        </div>

        <div class="mt-3">

            <form method="POST" action="{{ url('updateItem/'.$stock->id) }} " enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                        <label for="name" class="form-label">{{ __('Item Name') }}</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Enter the product name')}}" value={{$stock->name}} required autocomplete="name" autofocus required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
        
                    <div class="col-sm-6">
                        <label for="total_amount" class="form-label">{{ __('Total amount in stock') }}</label>

                            <input id="total_amount" placeholder="{{ __('Enter how many numbers in stock it will have') }}" type="number" class="form-control @error('total_amount') is-invalid @enderror" name="total_amount" value={{$stock->total_amount }} autocomplete="total_amount" required>

                            @error('total_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
        
                    <div class="col-12">
                        <label for="Catagory" class="form-label">{{ __('Category') }}</label>

                            <select class="form-control" id="role" name="category_id" required focus>
                                @foreach ($categories as $category)       
                                <option value="{{ $category->c_id }}" selected>{{ $category->category_name }}</option>        
                                @endforeach
                                <option value="Select Role" disabled selected>Click to Select Category</option>       
                            </select>
                    </div>
        
                    <div class="col-12">
                        <label for="image" class="form-label">{{ __('Photo') }}</label>

                            <input name="image"   type="file" class="form-control" value={{$stock->image}}>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    <div class="col-12">
                        <label for="price" class="form-label">{{ __('Price') }}</label>

                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" autocomplete="price" placeholder="{{ __('Enter the price in ETB') }}  " value={{$stock->price}} required>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                    </div>
        
                    <button class="w-100 btn btn-primary btn" type="submit">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection