@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Employer</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->status }}</td>
                                <td>{{ $job->user->name }}</td>
                                <td>
                                    <a href="{{ '/jobs/' . $job->id }}"
                                       class="btn btn-primary" target="_blank">
                                        <i data-toggle="tooltip" title="view" class="fa fa-eye"></i>
                                    </a>

                                    <a href="/jobs/{{ $job->id }}/edit"
                                       class="btn btn-warning" target="_blank">
                                        <i data-toggle="tooltip" title="Edit" class="fa fa-edit"></i>
                                    </a>

                                    @if($job->isPending())
                                        <form method="POST"
                                              action="/admin/jobs/{{ $job->id }}/approve"
                                              class="form" style="display:inline;">
                                            @csrf
                                            <button type="submit"
                                                    class="btn btn-success" target="_blank">
                                                <i data-toggle="tooltip" title="Approve" class="fa fa-check"></i>
                                            </button>
                                        </form>
                                    @endif

                                    @if(!$job->isBlocked())
                                        <form method="POST"
                                              action="/admin/jobs/{{ $job->id }}/block"
                                              class="form" style="display:inline;">
                                            @csrf
                                            <button type="submit"
                                                    class="btn btn-warning" target="_blank">
                                                <i data-toggle="tooltip" title="Block" class="fa fa-ban"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <form method="POST"
                                          action="/jobs/{{ $job->id }}"
                                          class="form" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger" target="_blank">
                                            <i data-toggle="tooltip" title="Block" class="fa fa-trash"></i>
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
                    <ul class="pagination pagination-sm no-margin pull-right">
                        @include('inc._paginate',['model' => $jobs])
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection