@extends('layouts.admin.app')
@section('page_header') Users @endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$num_users .' ' .  str_plural('user',$num_users)}} Found</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td> {{ $user->email }}</td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $users->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection