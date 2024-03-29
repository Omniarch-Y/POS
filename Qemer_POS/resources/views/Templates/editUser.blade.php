 
@extends('layouts.app')
@section('content')

<div class="container my-5"style="">
    <div class="row align-items-center ">
        <div class="col-md-8 mx-auto ">
            <strong>    
            @if ($message = Session::get('success'))
            <div class="alert alert-success center_text">
                <h4>{{ $message }}</h4>
            </div>
           @endif
            </strong>



            <!-- <div style="float:right; margin-top:8.5rem; margin-left:rem;">
                <img src="{{asset('storage/userImages/'.$user->avatar)}}" style="  max-width:7rem; min-height:7rem" alt="">
               
            </div> -->

            <div class="py-5 text-center">
              <i class="bi bi-pencil-square fs-1 icon-green" aria-hidden="true"></i>
            </div>

           <div class="mt-3">

                    <form method="POST" action="{{ url('updateUser/'.$user->id) }} " enctype="multipart/form-data">
                      @csrf
                        @method("PUT")
                        
                      <div class="row  g-4">
                        <div class="col-sm-6">
                          <label for="name" class="form-label">{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Enter the user name')}}" value="{{$user->name}}" required autocomplete="name" autofocus required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="col-sm-4">
                                <label for="sex" class="form-lable">{{ __('Sex') }}</label>
                                <div class="row ms-1">

                                    <div class="form-check col-sm-6">
                                        <input class="form-check-input" type="radio" name="sex" id="sex"
                                            value="{{ 'Female' }}" required>
                                        <label class="form-check-label" for="sex">Female</label>
                                    </div>

                                    <div class="form-check col-sm-6">
                                        <input class="form-check-input" type="radio" name="sex" id="sex"
                                            value="{{ 'Male' }}" required>
                                        <label class="form-check-label" for="sex">Male</label>
                                    </div>
                                </div>
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="col-sm-6">
                          <label for="dob" class="form-label">{{ __('Date of birth') }}</label>

                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" placeholder="{{ __('Enter the user dob')}}" value="{{$user->dob}}" required autocomplete="dob" autofocus required>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
            
                        <div class="col-sm-6">
                            <label for="Branch" class="form-label lable_color">{{ __('Branch') }}</label>
    
                            <select class="form-control" id="branch" name="branch" required focus>
                                @foreach($branches as $branch)
                                <option value="{{$branch->id}}" selected>{{$branch->branch_name}}</option>
                                @endforeach

                                <option value="Select Role" disabled selected></option>

                                @foreach($currentBranch as $C_branch)
                                <option value="{{$C_branch->id}}" selected>{{$C_branch->branch_name}}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="col-12">
                          <label for="Email" class="form-label">{{ __('Email') }}</label>

                                <input id="email" placeholder="{{ __('Enter new email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" autocomplete="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
            
                        <div class="col-12">
                          <label for="avatar" class="form-label">{{ __('Avatar') }}</label>
                          <input name="avatar" type="file" class="form-control" value={{$user->avatar}}>
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
            
                        <div class="col-12">
                          <label for="Phone number" class="form-label">{{ __('Phone number') }}</label>

                                <input id="phone_number" type="number" class="form-control @error('price') is-invalid @enderror" name="phone_number" autocomplete="phone_number" placeholder="{{ __('Enter the new phone number') }}" value="{{$user->phone_number}}" required>

                                @error('Phone number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                        </div>

                        <div class="col-4">
                          <label for="subcity" class="form-label">{{ __('Subcity') }}</label>
  
                              <input id="subcity" type="text" class="form-control @error('subcity') is-invalid @enderror" name="subcity" placeholder="{{ __('Enter the subcity')}}" required autocomplete="name" autofocus value="{{$address->subcity}}" required>
  
                              @error('subcity')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          
                      </div>
          
                      <div class="col-4">
                          <label for="city" class="form-label">{{ __('City') }}</label>
  
                              <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" autocomplete="city" placeholder="{{ __('Enter the city name') }}" value="{{$address->city}}" required>
  
                              @error('city')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                              
                      </div>
  
                      <div class="col-4">
                          <label for="country" class="form-label">{{ __('Country') }}</label>
  
                              <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" autocomplete="country" placeholder="{{ __('Enter the country name') }}" value="{{$address->country}}" required>
  
                              @error('country')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror              
                      </div>
                        <button class="w-100 btn btn-primary btn" type="submit">{{ __('Update') }}</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection