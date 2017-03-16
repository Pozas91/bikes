@extends('layouts.app')

@section('content')
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center">
                    @lang('bikes.my-bikes')
                </h4>
            </div>

            <div class="panel-body">
                <ul class="list-group">
                    @forelse($bikes as $bike)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xs-8 col-sm-10">
                                    <a href="{{route('bikes.show', $bike->id)}}" class="btn btn-info pull-left btn-block">
                                        {{$bike->full_model}}
                                    </a>
                                </div>
                                <div class="col-xs-2 col-sm-1">
                                    <a href="{{route('bikes.edit', $bike->id)}}" class="btn btn-warning pull-right">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                </div>
                                <div class="col-xs-2 col-sm-1">
                                    <form class="form-inline" action="{{route('bikes.destroy', $bike->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger pull-right">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <span class="clearfix"></span>
                        </li>
                    @empty
                        <li class="list-group-item">
                            @lang('messages.results-not-found')
                        </li>
                    @endforelse
                </ul>
            </div>

            <div class="panel-footer">
                <a href="{{route('bikes.create')}}" class="btn btn-primary btn-block text-capitalize">
                    @lang('actions.create')
                    <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
@endsection
