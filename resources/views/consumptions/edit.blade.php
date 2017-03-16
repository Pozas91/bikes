@extends('layouts.app')

@section('content')
    <div class="col-xs-12">
        <form action="{{route('bikes.consumptions.update', ['bike' => $bike->id, 'consumption' => $consumption->id])}}" role="form" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="text-capitalize text-center">
                        @lang('actions.edit')
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
                            <button type="submit" class="btn btn-warning btn-block text-capitalize">
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