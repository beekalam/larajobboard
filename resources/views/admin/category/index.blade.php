@extends('layouts.admin.app')

@section('page_header') Categories @endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Categories</h3>

                    <div class="box-tools">
                        <a class="btn btn-primary" href="/category/create">Add Category</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        @php($index = 1)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$index++}}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <form method="POST" action="/category/{{ $category->id }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                    <a href="/category/{{ $category->id }}/edit" class="btn btn-primary">edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection