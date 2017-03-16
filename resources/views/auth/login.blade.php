@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">

            <div class="panel-heading">
                @lang('auth.login')
            </div>

            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12">
                        <a href="{{route('provider.login', ['provider' => 'facebook'])}}" class="btn btn-primary btn-block">
                            <em class="fa fa-facebook"></em>
                            @lang('providers.login_with_facebook')
                        </a>
                    </div>
                </div>

                <hr />

                <form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">
                            @lang('users.email')
                        </label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password" class="control-label">
                            @lang('users.password')
                        </label>

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                @lang('auth.remember_me')
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block text-capitalize">
                            @lang('common.enter')
                        </button>
                    </div>

                    <div class="form-group text-center">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            @lang('auth.forgot_password')
                        </a>
                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection