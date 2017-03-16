@extends('layouts.app')

@section('content')
    <div class="col-xs-12">

        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>

    </div>
@endsection