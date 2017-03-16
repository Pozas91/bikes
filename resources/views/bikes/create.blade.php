@extends('layouts.app')

@section('content')
    <div class="col-xs-12">
        <form action="{{route('bikes.store')}}" role="form" method="POST">
        {{ csrf_field() }}

        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="text-capitalize text-center">
                    @lang('actions.create')
                </h4>
            </div>

            <div class="panel-body">

                <div class="form-group text-center">
                    <div class="radio-inline">
                        <label class="text-capitalize">
                            <input type="radio" name="options" id="new-bike-option" value="new-bike" checked />
                            @lang('bikes.new-bike')
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label class="text-capitalize">
                            <input type="radio" name="options" id="exist-bike-option" value="exist-bike" />
                            @lang('bikes.exist-bike')
                        </label>
                    </div>
                </div>

                <hr />

                <div id="new-bike">
                    @include('bikes.fields')
                </div>

                <div id="exist-bike" style="display: none;">
                    <div class="form-group {{ $errors->has('bike') ? 'has-error' : '' }}">
                        <label for="bike" class="control-label text-capitalize">
                            @lang('bikes.exist-bike') *
                        </label>

                        <select name="bike" id="bike" class="form-control" required>
                            @foreach($bikes as $bike)
                                <option value="{{$bike->id}}">
                                    {{$bike->full_model}}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('bike'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('bike') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>

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

@push('scripts')
    <script type="text/javascript">
        $(function() {
            $("input[name='options']").change(function() {
                var value = $(this).val();
                var newBike = $('#new-bike');
                var existBike = $('#exist-bike');

                $('#exist-bike :input').attr('required', false);
                $('#new-bike :input').attr('required', false);

                newBike.hide('slow');
                existBike.hide('slow');

                $('#' + value).show('slow');
                $('#' + value + ' :input').attr('required', false);
            });
        });
    </script>
@endpush