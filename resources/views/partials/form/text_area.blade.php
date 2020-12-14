
<div
    class="form-group {{ $col }}{{ isset($attributes['required']) ? ' required' : '' }}{{ isset($attributes['readonly']) ? ' readonly' : '' }}{{ isset($attributes['disabled']) ? ' disabled' : '' }}">
    @if (!empty($text))
        {!! Form::label($name, $text, ['class' => 'form-control-label'])!!}
    @endif

    {!! Form::textarea($name, $value, array_merge([
        'class' => 'form-control',
        'placeholder' => '',
    ], $attributes)) !!}

    <div class="invalid-feedback d-block"
         v-if="{{ isset($attributes['v-error']) ? $attributes['v-error'] : 'form.errors.has("' . $name . '")' }}"
         v-html="{{ isset($attributes['v-error-message']) ? $attributes['v-error-message'] : 'form.errors.get("' . $name . '")' }}">
    </div>
</div>
