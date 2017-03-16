@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">

            <div class="panel-heading">
                @lang('auth.register')
            </div>

            <div class="panel-body">

                <form role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="control-label">
                            @lang('users.name') *
                        </label>

                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus />

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('name') }}
                                </strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="control-label">
                            @lang('users.email') *
                        </label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required />

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('email') }}
                                </strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password" class="control-label">
                            @lang('users.password') *
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

                    <div class="form-group">
                        <label for="password-confirm" class="control-label">
                            @lang('users.confirm_password') *
                        </label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            @lang('auth.register')
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
