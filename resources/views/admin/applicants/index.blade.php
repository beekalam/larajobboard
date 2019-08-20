@extends('layouts.admin.app')
@section('page_header') Posted Jobs @endSection

@section('content')
    <div class="row">
        <div class="col-md-12">
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
                            <th>Name</th>
                            <th>Applied at</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Employer</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($applications as $ap)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ap->applicant->name }}</td>
                                <td>{{ $ap->applicant->created_at }}</td>
                                <td>{{ $ap->applicant->email }}</td>
                                <td>{{ $ap->applicant->phone }} </td>
                                <td>{{ $ap->employer->name }} </td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        @include('inc._paginate',['model' => $applications])
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection