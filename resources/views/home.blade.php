@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-html5-1.2.4/b-print-1.2.4/fh-3.1.2/r-2.1.0/sc-1.4.2/datatables.min.css"/>
@endpush

@section('content')
    <div class="col-xs-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="text-center">
                    @lang('bikes.bikes-listed-with-consumption')
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed table-bordered table-striped" id="bikes-table">
                        <thead>
                        <tr>
                            <th class="text-center text-capitalize">
                                @lang('bikes.branch')
                            </th>
                            <th class="text-center text-capitalize">
                                @lang('bikes.model')
                            </th>
                            <th class="text-center text-capitalize">
                                @lang('bikes.engine')
                            </th>
                            <th class="text-center text-capitalize">
                                @lang('bikes.avg-consumption')
                            </th>
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
                                @lang('bikes.urban-consumption')
                            </th>
                            <th class="text-center text-capitalize">
                                @lang('bikes.mixed-consumption')
                            </th>
                            <th class="text-center text-capitalize">
                                @lang('bikes.passenger-consumption')
                            </th>
                            <th class="text-center text-capitalize">
                                @lang('bikes.not-passenger-consumption')
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bikes as $bike)
                            <tr>
                                <td class="text-capitalize">
                                    {{$bike->branch}}
                                </td>
                                <td class="text-capitalize">
                                    {{$bike->model}}
                                </td>
                                <td class="text-capitalize">
                                    {{$bike->engine}}
                                </td>
                                <td class="text-capitalize">
                                    {{$bike->avg_consumption}}
                                </td>
                                <td class="text-capitalize">
                                    {{$bike->max_consumption}}
                                </td>
                                <td class="text-capitalize">
                                    {{$bike->min_consumption}}
                                </td>
                                <td class="text-capitalize">
                                    {{$bike->highway_consumption}}
                                </td>
                                <td class="text-capitalize">
                                    {{$bike->urban_consumption}}
                                </td>
                                <td class="text-capitalize">
                                    {{$bike->mixed_consumption}}
                                </td>
                                <td class="text-capitalize">
                                    {{$bike->passenger_consumption}}
                                </td>
                                <td class="text-capitalize">
                                    {{$bike->not_passenger_consumption}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>
                                <input type="text" name="filter_branch" placeholder="{{trans('bikes.branch')}}" class="form-control input-sm datatable_input_col_search">
                            </th>
                            <th>
                                <input type="text" name="filter_name" placeholder="{{trans('bikes.model')}}" class="form-control input-sm datatable_input_col_search">
                            </th>
                            <th>
                                <input type="text" name="filter_discos" placeholder="{{trans('bikes.engine')}}" class="form-control input-sm datatable_input_col_search">
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-html5-1.2.4/b-print-1.2.4/fh-3.1.2/r-2.1.0/sc-1.4.2/datatables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var datatable = $('#bikes-table').dataTable({
                'paging': true,  // Table pagination
                'ordering': true,  // Column ordering
                'info': true,  // Bottom left status text
                'responsive': true,
                'language': {
                    'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
                },
                'dom': 'ilft<"text-center"p>',
            });
            var inputSearchClass = 'datatable_input_col_search';
            var columnInputs = $('tfoot .' + inputSearchClass);

            // On input keyup trigger filtering
            columnInputs.keyup(function () {
                datatable.fnFilter(this.value, columnInputs.index(this));
            });
        });
    </script>
@endpush