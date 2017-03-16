<div class="form-group {{ $errors->has('km') ? 'has-error' : '' }}">
    <label for="km" class="control-label text-capitalize">
        @lang('consumptions.km') *
    </label>

    <input id="km" type="number" min="0" step="0.01" class="form-control" name="km" value="{{session()->has('_old_input.km') ? old('km') : ((isset($consumption)) ? $consumption->km : '')}}" placeholder="200" required autofocus />

    @if ($errors->has('km'))
        <span class="help-block">
            <strong>
                {{ $errors->first('km') }}
            </strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('liters') ? 'has-error' : '' }}">
    <label for="liters" class="control-label text-capitalize">
        @lang('consumptions.liters') *
    </label>

    <input id="liters" type="number" min="0" step="0.01" class="form-control" name="liters" value="{{session()->has('_old_input.liters') ? old('liters') : ((isset($consumption)) ? $consumption->liters : '')}}" placeholder="14" required />

    @if ($errors->has('liters'))
        <span class="help-block">
            <strong>
                {{ $errors->first('liters') }}
            </strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('driving_type') ? 'has-error' : '' }}">
    <label for="driving_type" class="control-label text-capitalize">
        @lang('consumptions.driving-type') *
    </label>

    <select name="driving_type" id="driving_type" class="form-control text-capitalize" required>
        <option value="urban">
            @lang('consumptions.urban')
        </option>
        <option value="mixed">
            @lang('consumptions.mixed')
        </option>
        <option value="highway">
            @lang('consumptions.highway')
        </option>
    </select>

    @if ($errors->has('driving_type'))
        <span class="help-block">
            <strong>
                {{ $errors->first('driving_type') }}
            </strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('passenger') ? 'has-error' : '' }}">
    <label for="liters" class="control-label text-capitalize">
        @lang('consumptions.passenger') *
    </label>

    <select name="passenger" id="passenger" class="form-control text-capitalize" required>
        <option value="yes">
            @lang('actions.yes')
        </option>
        <option value="no">
            @lang('actions.no')
        </option>
    </select>

    @if ($errors->has('passenger'))
        <span class="help-block">
            <strong>
                {{ $errors->first('passenger') }}
            </strong>
        </span>
    @endif
</div>

@push('javascript')
    <script type="text/javascript">
        $('#driving_type option[value="{{session()->has('_old_input.driving_type') ? old('driving_type') : ((isset($consumption)) ? $consumption->driving_type : '')}}"]').attr('selected', true);
        $('#passenger option[value="{{session()->has('_old_input.passenger') ? old('passenger') : ((isset($consumption)) ? ($consumption->passenger ? 'yes' : 'no') : '')}}"]').attr('selected', true);
    </script>
@endpush