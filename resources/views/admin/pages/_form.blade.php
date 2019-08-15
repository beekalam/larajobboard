<div class="form-group @error('title') has-error @enderror">
    <label for="title" class="col-sm-2">Title</label>
    <div class="col-sm-10">
        <input type="text" name="title" id="title"
               value="{{ old('title',$page->title) }}"
               placeholder="Title" class="form-control">
        @if($errors->has('title'))
            <span class='help-block'>{{ $errors->first('title') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('content') has-error @enderror">
    <label for="content" class="col-sm-2">Content</label>
    <div class="col-sm-10">
                             <textarea name="content" id="content" cols="30" rows="3"
                                       class="form-control">{{ old('content',$page->content) }}</textarea>
        @if($errors->has('content'))
            <span class='help-block'>{{ $errors->first('content') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
</div>


<div class="form-group">
    <div class="col-xs-6">
        <label>
            <input type="checkbox" name="show_in_footer_menu" id="" class=""
                    {{ old('show_in_footer_menu', $page->show_in_footer_menu)==true ? 'checked="checked"': '' }}>
            Show in footer menu
        </label>
    </div>
    <div class="col-xs-6">
        <label>
            <input type="checkbox" name="show_in_header_menu" id="" class=""
                    {{ old('show_in_header_menu', $page->show_in_header_menu)==true ? 'checked="checked"': '' }}>
            Show in header menu
        </label>
    </div>
</div>

@section('scripts')
    <script src="{{ asset('AdminLTE-2.4.12/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            CKEDITOR.replace('content');
        });
    </script>
@endsection
