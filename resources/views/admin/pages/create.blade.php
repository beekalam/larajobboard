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
                        @include('admin.pages._form')
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

