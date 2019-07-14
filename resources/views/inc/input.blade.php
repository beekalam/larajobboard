@php
    $classes = 'form-control';
    $placeholder = isset($placeholder) ? $placeholder:'';
    $name = isset($name) ? $name: '';
    $id = isset($id) ? $id: $name;
@endphp

@if($type == 'email')
    <input type="email"
           {!! $classes !!} {!! $name !!} {!! $placeholder !!} @isset($value) value="{{ $value }}" @endisset>
@elseif($type == 'text')
    <input type="text"
           class="{!! $classes !!} @error($name) is-invalid @enderror"
           name="{!! $name !!}" id="{!! $id !!}" @isset($value) value="{{ $value }}" @endisset

            {!! $placeholder !!} >
@elseif($type == 'select')
    <select class="{!! $classes !!} @error($name) is-invalid @enderror"
            name="{!! $name !!} id="{!! $id !!}>
        <option value="">Select one</option>
        @foreach($options as $k=>$v)
            <option value="{{ $k }}">{{$v}}</option>
        @endforeach
    </select>
@endif