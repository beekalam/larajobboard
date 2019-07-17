@extends('layouts.admin.app')
@section('page_header') Edit Job @endSection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Job</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/jobs/{{ $job->id }}" method="post" class="form-horizontal">
                    @csrf
                    @method("PUT")
                    <div class="box-body">
                        @include('admin.jobs._form')
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

