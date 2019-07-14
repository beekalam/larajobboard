@extends('layouts.admin.app')
@section('page_header') Edit Category @endSection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/category/{{$category->id}}" method="post">
                    @csrf
                    @method('PUT')
                    @include('admin.category._form')
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
