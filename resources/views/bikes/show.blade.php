@extends('layouts.app')

@section('content')
    <div class="col-xs-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="text-center text-capitalize">
                    @lang('bikes.consumption-100')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped">
                    <thead>
                    <tr>
                        <th class="text-center text-capitalize">
                            @lang('bikes.max-consumption')
                        </th>
                        <th class="text-center text-capitalize">
                            @lang('bikes.min-consumption')
                        </th>
                        <th class="text-center text-capitalize">
                            @lang('bikes.highway-consumption')
                        </th>
                        <th class="text-center text-capitalize">
                            @lang('bikes.mixed-consumption')
                        </th>
                        <th class="text-center text-capitalize">
                            @lang('bikes.urban-consumption')
                        </th>
                        <th class="text-center text-capitalize">
                            @lang('bikes.passenger-consumption')
                        </th>
                        <th class="text-center text-capitalize">
                            @lang('bikes.not-passenger-consumption')
                        </th>
                        <th class="text-center text-capitalize">
                            @lang('bikes.avg-consumption')
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-capitalize text-center">
                                {{$bike->user_max_consumption}}
                            </td>
                            <td class="text-capitalize text-center">
                                {{$bike->user_min_consumption}}
                            </td>
                            <td class="text-capitalize text-center">
                                {{$bike->user_highway_consumption}}
                            </td>
                            <td class="text-capitalize text-center">
                                {{$bike->user_mixed_consumption}}
                            </td>
                            <td class="text-capitalize text-center">
                                {{$bike->user_urban_consumption}}
                            </td>
                            <td class="text-capitalize text-center">
                                {{$bike->user_passenger_consumption}}
                            </td>
                            <td class="text-capitalize text-center">
                                {{$bike->user_not_passenger_consumption}}
                            </td>
                            <td class="text-capitalize text-center">
                                {{$bike->user_avg_consumption}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="text-capitalize text-center">
                    {{$bike->full_model}}
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center text-capitalize">
                                @lang('consumptions.km')
                            </th>
                            <th class="text-center text-capitalize">
                                @lang('consumptions.liters')
                            </th>
                            <th class="text-center text-capitalize">
                                @lang('consumptions.driving-type')
                            </th>
                            <th class="text-center text-capitalize">
                                @lang('consumptions.passenger')
                            </th>
                            <th class="text-center text-capitalize">
                                @lang('actions.options')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consumptions as $consumption)
                            <tr>
                                <td class="text-center">
                                    {{$consumption->km}}
                                </td>
                                <td class="text-center">
                                    {{$consumption->liters}}
                                </td>
                                <td class="text-center text-capitalize">
                                    @lang('consumptions.'.$consumption->driving_type)
                                </td>
                                <td class="text-center">
                                    @if($consumption->passenger)
                                        <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                    @else
                                        <span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="col-xs-6">
                                        <a href="{{route('bikes.consumptions.edit', ['bike' => $bike->id, 'consumption' => $consumption->id])}}" class="btn btn-warning btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                    <div class="col-xs-6">
                                        <form action="{{route('bikes.consumptions.destroy', ['bike' => $bike->id, 'consumption' => $consumption->id])}}" role="form" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="{{route('bikes.index')}}" class="btn btn-info btn-block text-capitalize">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            @lang('actions.back-listed')
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a href="{{route('bikes.consumptions.create', $bike->id)}}" class="btn btn-primary btn-block text-capitalize">
                            @lang('actions.create')
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
