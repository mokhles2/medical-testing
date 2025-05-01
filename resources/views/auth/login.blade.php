@extends('layouts.app')
@section('title')
{{ trans('auth.login') }}
@endsection
@section('content')
<div class="login">

    <div class="main-agileits">
            <div class="form-w3agile">
                <h3>Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        

                        <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="{{ old('national_id') }}"  name="national_id" class="@error('national_id') is-invalid @enderror" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'National Id';}" required="">
							<div class="clearfix"></div>
                            @error('national_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password"  class="@error('password') is-invalid @enderror" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required autocomplete="current-password" required="">
							<div class="clearfix"></div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<input type="submit" value="Login">
                        
                    </form>

                </div>
            </div>
</div>
@endsection
