<div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
    <label for="branch" class="control-label text-capitalize">
        @lang('bikes.branch') *
    </label>

    <input id="branch" type="text" class="form-control" name="branch" value="{{session()->has('_old_input.branch') ? old('branch') : ((isset($bike)) ? $bike->branch : '')}}"
           placeholder="Suzuki" required autofocus/>

    @if ($errors->has('branch'))
        <span class="help-block">
            <strong>
                {{ $errors->first('branch') }}
            </strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('model') ? 'has-error' : '' }}">
    <label for="branch" class="control-label text-capitalize">
        @lang('bikes.model') *
    </label>

    <input id="model" type="text" class="form-control" name="model" value="{{session()->has('_old_input.model') ? old('model') : ((isset($bike)) ? $bike->model : '')}}" placeholder="Bandit"
           required/>

    @if ($errors->has('model'))
        <span class="help-block">
            <strong>
                {{ $errors->first('model') }}
            </strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('engine') ? 'has-error' : '' }}">
    <label for="engine" class="control-label text-capitalize">
        @lang('bikes.engine') *
    </label>

    <input id="engine" type="number" step="1" min="35" class="form-control" name="engine"
           value="{{session()->has('_old_input.engine') ? old('engine') : ((isset($bike)) ? $bike->engine : '')}}" placeholder="600" required/>

    @if ($errors->has('engine'))
        <span class="help-block">
            <strong>
                {{ $errors->first('engine') }}
            </strong>
        </span>
    @endif
</div>