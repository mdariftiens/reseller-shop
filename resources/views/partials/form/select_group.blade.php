@stack($name . '_input_start')

<div class="form-group {{ $col }} {{ isset($attributes['required']) ? ' required' : '' }} {{ isset($attributes['readonly']) ? ' readonly' : '' }} {{ isset($attributes['disabled']) ? ' disabled' : '' }}">

    @if (!empty($label))
        {!! Form::label($name, $label, ['class' => 'form-control-label'])!!}
        {!! isset($attributes['required']) ? '<span class="text-danger">*</span>' : ''  !!}
    @endif

        {{ Form::select($name, $value, $defaultValue, $attributes) }}

    @php
        $name = str_replace("[","",$name);
        $name = str_replace("]","",$name);
    @endphp

    @if( $errors->has($name))
        <div class="invalid-feedback d-block">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
@stack($name . '_input_end')
