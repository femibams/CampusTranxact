@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/BusinessRegister">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('businessname') ? ' has-error' : '' }}">
                            <label for="businessname" class="col-md-4 control-label">Buisness Name</label>

                            <div class="col-md-6">
                                <input id="businessname" type="text" class="form-control" name="businessname" value="{{ old('businessname') }}" required autofocus>

                                @if ($errors->has('businessname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('businessname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                
                        
                    
                        
                       <input type="hidden" name="user_type" value="business">
                        

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Business E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group{{ $errors->has('mobilenumber') ? ' has-error' : '' }}">
                            <label for="mobilenumber" class="col-md-4 control-label">MobileNumber</label>

                            <div class="col-md-6">
                                <input id="mobilenumber" type="text" class="form-control" name="mobilenumber" value="{{ old('mobilenumber') }}" required autofocus>

                                @if ($errors->has('mobilenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
