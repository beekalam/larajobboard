@extends('layouts.admin.app')
@section('page_header') Profile @endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Profile</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="mb-3" style="max-width: 100px;">
                        <img src="{{ asset('storage/company_logo/'.$user->logo)  }}"
                             class="img-fluid">
                    </div>

                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <th>Phone</th>
                            <td>{{ $user->phone }}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{ $user->address }}</td>
                        </tr>

                        <tr>
                            <th>Country</th>
                            <td>{{ $user->country_name }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{ $user->status }}</td>
                        </tr>
                        </tbody>
                    </table>

                    @if($user->user_type == 'employer')
                        <h1>About Company</h1>
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>State</th>
                                <td>{{ $user->state_name }}</td>
                            </tr>

                            <tr>
                                <th>City</th>
                                <td>{{ $user->city }}</td>
                            </tr>

                            <tr>
                                <th>Website</th>
                                <td>{{ $user->website }}</td>
                            </tr>

                            <tr>
                                <th>Company</th>
                                <td>{{ $user->company }}</td>
                            </tr>

                            <tr>
                                <th>Company Size</th>
                                <td>{{ $user->company_size }}</td>
                            </tr>

                            <tr>
                                <th>About Company</th>
                                <td>{{ $user->about_company }}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endif

                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection