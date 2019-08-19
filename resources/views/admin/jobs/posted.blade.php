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
                            <th>Employer</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->user->name }}</td>
                                <td>
                                    @if($job->isApproved())
                                        <button type="submit" class="btn btn-success">
                                            <i data-toggle="tooltip" title="Approved" class="fa fa-check"></i>
                                        </button>
                                    @endif

                                    @if($job->isPending())
                                        <span type="submit" class="btn btn-warning">
                                            <i data-toggle="tooltip" title="pending Activation" class="fa fa-hourglass-half"></i>
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="/jobs/{{ $job->id }}/edit"
                                       class="btn btn-primary">
                                        <i data-toggle="tooltip" title="Edit" class="fa fa-edit"></i>
                                    </a>

                                    @can('delete',$job)
                                        <form action="/jobs/{{ $job->id }}" method="post" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button href="/jobs/{{ $job->id }}" type="submit"
                                                    class="btn btn-danger">
                                                <i data-toggle="tooltip" title="Delete" class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        @include('inc._paginate',['model' => $jobs])
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection