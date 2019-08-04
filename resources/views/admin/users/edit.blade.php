@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-xs-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit User</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="/users/{{ $user->id }}">
                    @csrf
                    @method("PUT")
                    <div class="box-body">

                        <div class="form-group @error('name') has-error @enderror">
                            <label for="name" class="col-sm-2">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name"
                                       value="{{ old('name',$user->name) }}"
                                       placeholder="Name" class="form-control">
                                @if($errors->has('name'))
                                    <span class='help-block'>{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('email') has-error @enderror">
                            <label for="email" class="col-sm-2">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" id="email"
                                       value="{{ old('email',$user->email) }}"
                                       placeholder="Email" class="form-control">
                                @if($errors->has('email'))
                                    <span class='help-block'>{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('gender') has-error @enderror">
                            <label for="gender" class="col-sm-2">Gender</label>
                            <div class="col-sm-10">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select a gender</option>
                                    @foreach(['male' => 'Male','female' => 'Female'] as $k=>$v)
                                        <option value="{{ $k }}"
                                                {{ old('gender',$user->gender) == $user->gender ? "selected":"" }}
                                        >{{ $v }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('gender'))
                                    <span class='help-block'>{{ $errors->first('gender') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('phone') has-error @enderror">
                            <label for="phone" class="col-sm-2">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" id="phone"
                                       value="{{ old('phone',$user->phone) }}"
                                       placeholder="Phone" class="form-control">
                                @if($errors->has('phone'))
                                    <span class='help-block'>{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('address') has-error @enderror">
                            <label for="address" class="col-sm-2">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" id="address"
                                       value="{{ old('address',$user->address) }}"
                                       placeholder="Address" class="form-control">
                                @if($errors->has('address'))
                                    <span class='help-block'>{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {{--                        <button type="submit" class="btn btn-default">Cancel</button>--}}
                        <button type="submit" class="btn btn-info pull-right">Edit</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>


            <form action="/user/{{$user->id}}/" method="post" class="form">


            </form>
        </div>
    </div>
@endsection