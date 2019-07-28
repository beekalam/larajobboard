@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Page</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/pages" method="post">
                    <div class="box-body">
                        @csrf
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

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {{--                        <button type="submit" class="btn btn-default">Cancel</button>--}}
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection