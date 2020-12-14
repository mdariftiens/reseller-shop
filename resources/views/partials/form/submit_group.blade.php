{{--{!! dd( get_defined_vars() ) !!}--}}
<div class="form-group {{ $col }} {{ isset($attributes['required']) ? ' required' : '' }} {{ isset($attributes['readonly']) ? ' readonly' : '' }} {{ isset($attributes['disabled']) ? ' disabled' : '' }}">
    @if (!empty($label))
        {!! Form::label($name, $label, ['class' => 'form-control-label'])!!}
    @endif

    {!! Form::textarea($name, $value, array_merge([
        'class' => 'form-control',
        'placeholder' => '',
    ], $attributes)) !!}

    @if( $errors->has($name))
    <div class="invalid-feedback d-block">
        {{ $errors->first($name) }}
    </div>
    @endif
</div>
