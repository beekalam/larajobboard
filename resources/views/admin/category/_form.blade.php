<div class="box-body">
    <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
        <label for="category">Category</label>
        <input type="text" class="form-control" id="category" placeholder="category" name="name"
               value="{{ old('name',$category->name) }}">
        @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>
<!-- /.box-body -->
