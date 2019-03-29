
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EditPage') }}</div>
                <div class="card-body">
                    <form id="myForm" method="POST" action="/users/{{$user->id}}">
                    @method('PATCH')
                    @csrf
                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('UserName') }}
                            <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control{{ $errors->has('user_name') ? 
                                ' is-invalid' : '' }}" name="user_name" value="{{$user->user_name}}" required autofocus>

                                @if ($errors->has('user_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('FirstName') }}
                            <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' 
                                is-invalid' : '' }}" name="first_name"value="{{$user->first_name}}" required>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('LastName') }}
                            <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? '
                                is-invalid' : '' }}" name="last_name" value="{{$user->last_name}}" required>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}
                            <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' 
                                is-invalid' : '' }}" name="address" value="{{$user->address}}" required>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}
                            <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' 
                                is-invalid' : '' }}" name="city" value="{{$user->city}}" required>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="house_number" class="col-md-4 col-form-label text-md-right">{{ __('HouseNumber') }}
                            <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="house_number" type="text" class="form-control{{ $errors->has('house_number') ? 
                                ' is-invalid' : '' }}" name="house_number" value="{{$user->house_number}}" required>
                                @if ($errors->has('house_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('house_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     <div class="form-group row">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('PostalCode') }}
                            <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? 
                                ' is-invalid' : '' }}" name="postal_code" value="{{$user->postal_code}}" required>
                                @if ($errors->has('postal_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>     
                          <div class="form-group row">
                            <label for="telephone_number" class="col-md-4 col-form-label text-md-right">{{ __('Telephone number') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="telephone_number" type="text" class="form-control{{ $errors->has('telephone_number') ? ' is-invalid' : '' }}" name="telephone_number" value="{{$user->telephone_number}}" required>
                                @if ($errors->has('telephone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>       
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label  text-md-right">Activate User <span class="text-danger">*</span></label>

                                <div class="col-md-4 checkbox-field">

                                    <input id="status" type="checkbox" class="form-control" name="status" value="1"  checked>

                                </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }} 
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
                     document.getElementById('user_name').value = "";
                     document.getElementById('last_name').value = "";
                     document.getElementById('first_name').value = "";
                     document.getElementById('email').value = "";
                     document.getElementById('address').value = "";
                     document.getElementById('city').value = "";
                     document.getElementById('postal_code').value = "";
                     document.getElementById('house_number').value = "";
                      document.getElementById('telephone_number').value = "";
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
