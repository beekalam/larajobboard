@extends('layouts.admin.app')
@section('page_header') Posted Jobs @endSection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Posted Jobs</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Employer</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->status }}</td>
                                <td></td>
                                <td>
                                    <a href="/jobs/{{ $job->id }}/edit"
                                       class="btn btn-primary">
                                        <i data-toggle="tooltip" title="Edit" class="fa fa-edit"></i>
                                    </a>


                                    <form action="/jobs/{{ $job->id }}" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button href="/jobs/{{ $job->id }}" type="submit"
                                                class="btn btn-danger">
                                            <i data-toggle="tooltip" title="Delete" class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {{ $jobs->links() }}
                    {{--                    <ul class="pagination pagination-sm no-margin pull-right">--}}
                    {{--                        <li><a href="#">«</a></li>--}}
                    {{--                        <li><a href="#">1</a></li>--}}
                    {{--                        <li><a href="#">2</a></li>--}}
                    {{--                        <li><a href="#">3</a></li>--}}
                    {{--                        <li><a href="#">»</a></li>--}}
                    {{--                    </ul>--}}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection