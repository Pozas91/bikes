@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('auth.reset_password')
            </div>

            <div class="panel-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

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

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            @lang('auth.send_password_reset_link')
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
