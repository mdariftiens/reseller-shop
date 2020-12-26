@stack($name . '_input_start')

<div class="form-group {{ $col }} {{ isset($attributes['required']) ? ' required' : '' }} {{ isset($attributes['readonly']) ? ' readonly' : '' }} {{ isset($attributes['disabled']) ? ' disabled' : '' }}">

    @if (!empty($label))
        {!! Form::label($name, $label, ['class' => 'form-control-label'])!!}
        {!! isset($attributes['required']) ? '<span class="text-danger">*</span>' : ''  !!}
    @endif

    <input name="{{$name}}" type="hidden" value="0">


    <input name="{{ $name }}" type="checkbox"
           value="1"
           id="{{$name}}"
           {{  old($name,$value)  == 1 ? 'checked':'' }}
    >

    @if( $errors->has($name))
        <div class="invalid-feedback d-block">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
@stack($name . '_input_end')
