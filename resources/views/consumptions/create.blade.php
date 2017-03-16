@extends('layouts.app')

@section('content')
    <div class="col-xs-12">
        <form action="{{route('bikes.consumptions.store', ['bike' => $bike->id])}}" role="form" method="POST">
            {{ csrf_field() }}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="text-capitalize text-center">
                        @lang('actions.create')
                    </h4>
                </div>
                <div class="panel-body">

                    @include('consumptions.fields')

                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{route('bikes.show', ['bike' => $bike->id])}}" class="btn btn-info btn-block text-capitalize">
                                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                                @lang('actions.back-listed')
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-success btn-block text-capitalize">
                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                                @lang('actions.save')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection