@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                 @if($errors->any())
<div class="notification is-danger">
   <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
   </ul>
</div>
@endif
                    <form id="myForm" method="POST" action="/users">
                        @csrf

                        <div class="form-group row {{ $errors->has('user_name') ? 'has-error' : '' }}">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('UserName') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" autofocus>

                                @if ($errors->has('user_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('FirstName') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group row {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('LastName') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" >

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row {{ $errors->has('house_number') ? 'has-error' : '' }}">
                            <label for="house_number" class="col-md-4 col-form-label text-md-right">{{ __('HouseNumber') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="house_number" type="text" class="form-control" name="house_number" value="{{ old('house_number') }}">
                                @if ($errors->has('house_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('house_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     <div class="form-group row {{ $errors->has('postal_code') ? 'has-error' : '' }}">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('PostalCode') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ old('postal_code') }}">
                                @if ($errors->has('postal_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>     
                          <div class="form-group row {{ $errors->has('telephone_number') ? 'has-error' : '' }}">
                            <label for="telephone_number" class="col-md-4 col-form-label text-md-right">{{ __('Telephone number') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="telephone_number" type="text" class="form-control" name="telephone_number" value="{{ old('telephone_number') }}">
                                @if ($errors->has('telephone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>       
                        <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" value="{{ old('email') }}" name="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                 @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
                            </div>
                        </div>
                         <div class="form-group row ">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Activate User <span class="text-danger">*</span></label>

                                <div class="col-md-6 checkbox-field">

                                    <input id="status" type="checkbox" class="form-control" name="status" value="1">

                                 </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('CreateAccount') }}
                                </button>
                                  <button type="button" class="btn btn-primary" onClick="resetFormFields();">
                                        Reset
                                    </button>
                            </div>
                        </div>
                    </form>
                
                    <script>
                    function resetFormFields() {
                    /*Put all the data posting code here*/
                    document.getElementById("myForm").reset();
                    }
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection