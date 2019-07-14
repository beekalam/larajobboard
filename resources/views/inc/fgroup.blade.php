@php
    $show_feedback = isset($show_feedback) ? $show_feedback : true;
@endphp
<div class="form-group">
    @if(isset($label))
        <label>{{ $label }}</label>
    @endif

    @if(isset($input))
        @component("inc.input",$input)
        @endcomponent
        @if($show_feedback)
            @error($input['name'])
            <div class="invalid-feedback">
                {{ $errors->first($input['name']) }}
            </div>
            @enderror
        @endif
    @endif

    @if(isset($content))
        {{ $content }}
    @endif

    @if(isset($help))
        <span class="form-text text-muted">{{ $help }}</span>
    @endif
</div>
