@extends('layouts.admin.app')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="/change-password/{{ $user->id }}">
                    @csrf
                    <div class="box-body">
                        @foreach($errors->all() as $error)
                            <span class="help-block bg-danger">{{ $error }}</span>
                        @endforeach

                        <div class="form-group @error('now_password') has-error @enderror">
                            <label for="now_password" class="col-sm-2">Now password</label>
                            <div class="col-sm-10">
                                <input type="password" name="now_password" id="now_password"
                                       value="{{ old('now_password') }}"
                                       placeholder="Now password" class="form-control">
                                @if($errors->has('now_password'))
                                    <span class='help-block'>{{ $errors->first('now_password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('new_password') has-error @enderror">
                            <label for="new_password" class="col-sm-2">New passsword</label>
                            <div class="col-sm-10">
                                <input type="password" name="new_password" id="new_password"
                                       value="{{ old('new_password') }}"
                                       placeholder="New password" class="form-control">
                                @if($errors->has('new_password'))
                                    <span class='help-block'>{{ $errors->first('new_password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('new_password_repeat') has-error @enderror">
                            <label for="new_password_repeat" class="col-sm-2">New Password Repeat</label>
                            <div class="col-sm-10">
                                <input type="password" name="new_password_repeat" id="new_password_repeat"
                                       value="{{ old('new_password_repeat') }}"
                                       placeholder="New password repeat" class="form-control">
                                @if($errors->has('new_password_repeat'))
                                    <span class='help-block'>{{ $errors->first('new_password_repeat') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Update Password</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection

