@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('auth.reset_password')
            </div>

            <div class="panel-body">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form role="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}" />

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="control-label">
                            @lang('users.email') *
                        </label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus />

                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>
                                        {{ $errors->first('email') }}
                                    </strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">
                            @lang('users.password')
                        </label>

                        <input id="password" type="password" class="form-control" name="password" required />

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('password') }}
                                </strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label for="password-confirm" class="control-label">
                            @lang('users.password_confirmation')
                        </label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required />

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            @lang('auth.reset_password')
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
