@extends('layouts.admin.app')
@section('page_header') Profile  @endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Profile</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="/update-profile/{{ $user->id }}" class="form-horizontal"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="company" class="col-sm-2">Company</label>
                            <div class="col-sm-10">
                                <input type="text" name="company" id="company"
                                       value="{{ $user->company }}"
                                       disabled="disabled"
                                       placeholder="Company" class="form-control">
                            </div>
                        </div>

                        <div class="form-group @error('company_size') has-error @enderror">
                            <label for="company_size" class="col-sm-2">Company size</label>
                            <div class="col-sm-10">
                                <select name="company_size" id="company_size" class="form-control ">
                                    <option value="">Select company size</option>
                                    <option value="1-100">1-10</option>
                                    <option value="11-50">11-50</option>
                                    <option value="51-200">51-200</option>
                                    <option value="201-500">201-500</option>
                                    <option value="501-1000">501-1000</option>
                                    <option value="1001-5000">1001-5000</option>
                                    <option value="50001-10000">5001-10,000</option>
                                    <option value="100001+">10,001+</option>
                                </select>
                                @if($errors->has('company_size'))
                                    <span class='help-block'>{{ $errors->first('company_size') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('country') has-error @enderror">
                            <label for="country" class="col-sm-2">Country</label>
                            <div class="col-sm-10">
                                <select name="country" id="country" class="form-control">
                                    <option value="">Select a country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
                                                {{ old('country',$user->country_id) == $country->id ? "selected":"" }}
                                        >{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('country'))
                                    <span class='help-block'>{{ $errors->first('country') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('state') has-error @enderror">
                            <label for="state" class="col-sm-2">State</label>
                            <div class="col-sm-10">
                                <select name="state" id="state" class="form-control">
                                    <option value="">Select a state</option>
                                    @if($user->state)
                                        @foreach($user->country->states as $state)
                                            <option
                                                    {{ $user->state_id == $state->id ? "selected='selected'":"" }}
                                                    value="{{ $state->id }}">{{ $state->state_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($errors->has('state'))
                                    <span class='help-block'>{{ $errors->first('state') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('city') has-error @enderror">
                            <label for="city" class="col-sm-2">City</label>
                            <div class="col-sm-10">
                                <input type="text" name="city" id="city"
                                       value="{{ old('city',$user->city) }}"
                                       placeholder="City" class="form-control">
                                @if($errors->has('city'))
                                    <span class='help-block'>{{ $errors->first('city') }}</span>
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

                        <div class="form-group @error('address_2') has-error @enderror">
                            <label for="address_2" class="col-sm-2">Address Line 2</label>
                            <div class="col-sm-10">
                                <input type="text" name="address_2" id="address_2"
                                       value="{{ old('address_2',$user->address_2) }}"
                                       placeholder="Address Line 2" class="form-control">
                                @if($errors->has('address_2'))
                                    <span class='help-block'>{{ $errors->first('address_2') }}</span>
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

                        <div class="form-group @error('about_company') has-error @enderror">
                            <label for="about_company" class="col-sm-2">About company</label>
                            <div class="col-sm-10">
                             <textarea name="about_company" id="about_company" cols="30" rows="3"
                                       class="form-control">{{ old('about_company',$user->about_company) }}</textarea>
                                @if($errors->has('about_company'))
                                    <span class='help-block'>{{ $errors->first('about_company') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group @error('website') has-error @enderror">
                            <label for="website" class="col-sm-2">Website</label>
                            <div class="col-sm-10">
                                <input type="text" name="website" id="website"
                                       value="{{ old('website',$user->website) }}"
                                       placeholder="Website" class="form-control">
                                @if($errors->has('website'))
                                    <span class='help-block'>{{ $errors->first('website') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="logo" class="col-sm-2">Logo</label>
                            <div class="col-sm-10">
                                <div class="mb-3" style="max-width: 100px;">
                                    <img src="{{ asset('storage/company_logo/'.$user->logo)  }}"
                                         class="img-fluid">
                                </div>
                                <input type="file" name="logo" id="log" class="form-control">
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Update Profile</button>
                        </div>

                    </form>
                </div>
                <!-- /.box-body -->

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                let country_id = this.value;
                $.ajax({
                    type: "GET",
                    url: `/${country_id}/states`,
                    success: function (countries) {
                        var options = "<option value=''>Select a state</option>\n";
                        for (var i = 0; i < countries.length; i++) {
                            options += "<option value='" + countries[i]['id'] + "'>" + countries[i]['state_name'] + "</option>\n";
                        }
                        $('#state').html(options);
                    }
                });

            });
        });
    </script>
@endsection

