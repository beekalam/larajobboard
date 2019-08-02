<div class="form-group @error('title') has-error @enderror">
    <label for="title" class="col-sm-2">Title</label>
    <div class="col-sm-10">
        <input type="text" name="title" id="title"
               value="{{ old('title',$post->title) }}"
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
                                       class="form-control">{{ old('content',$post->content) }}</textarea>
        @if($errors->has('content'))
            <span class='help-block'>{{ $errors->first('content') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="image">Image</label>
    <div class="col-sm-10">
        <div class="mb-3">
            <img  style="width:100px;"
                    src="{{ asset('storage/'.  $post->feature_image) }}" alt="">
        </div>
        <input type="file" name="feature_image" id="feature_image">
    </div>
</div>