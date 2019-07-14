@extends('layouts.admin.app')
@section('page_header') New Job @endSection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">New Job</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/category" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title',$job->title)  }}"
                                   placeholder="Title" class="form-control">
                        </div>

                        <div class="form-group @error('position') has-error @enderror">
                            <label for="position">Position</label>
                            <input type="text" name="position" id="position"
                                   value="{{ old('position',$job->position) }}"
                                   placeholder="Position" class="form-control">
                            @if($errors->has('position'))
                                <span class='help-block'>{{ $errors->first('position') }}</span>
                            @endif
                        </div>

                        <div class="form-group @error('category') has-error @enderror">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control">
                                <option value="">Select a Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            {{ old('category_id',(isset($job->category) ? $job->category->id:'')) == $category->id ? "selected":"" }}
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <span class="help-block">{{ $erorrs->first('category') }}</span>
                            @endif
                        </div>

                        <div class="form-group @error('cycle') has-error @enderror">
                            <label for="cycle">cycle</label>
                            <select name="cycle" id="cycle" class="form-control">
                                <option value="">Select a cycle</option>
                                @foreach(['yearly','monthly','weekly','daily','hourly'] as $salary_cycle)
                                    <option value="{{ $salary_cycle }}"
                                            {{ old('cycle',$job->$salary_cycle) == $salary_cycle ? "selected":"" }}
                                    >{{ ucfirst($salary_cycle) }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cycle'))
                                <span class='help-block'>{{ $errors->first('cycle') }}</span>
                            @endif
                        </div>

                        <div class="form-group @error('salary') has-error @enderror">
                            <label for="salary">salary</label>
                            <input type="number" name="salary" id="salary"
                                   value="{{ old('salary',$job->salary) }}"
                                   class="form-control">
                            @if($errors->has('salary'))
                                <span class='help-block'>{{ $errors->first('salary') }}</span>
                            @endif
                        </div>

                        <div class="form-group @error('salary_max') has-error @enderror">
                            <label for="salary_max">Salary Upto</label>
                            <input type="text" name="salary_max" id="salary_max"
                                   value="{{ old('salary_max',$job->salary_max) }}"
                                   placeholder="" class="form-control">
                            @if($errors->has('salary_max'))
                                <span class='help-block'>{{ $errors->first('salary_max') }}</span>
                            @endif
                        </div>

                        <div class="form-group @error('currency') has-error @enderror">
                            <label for="currency">currency</label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="">Select a currency</option>
                                @foreach(get_currencies() as $currency => $currency_name)
                                    <option value="{{ $currency }}"
                                            {{ old('currency',$job->currency) == $currency ? "selected":"" }}
                                    >{{ $currency }} | {{ $currency_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('currency'))
                                <span class='help-block'>{{ $errors->first('currency') }}</span>
                            @endif
                        </div>

                        <div class="form-group @error('gender') has-error @enderror">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select a gender</option>
                                @foreach(['male','female','any'] as $gender)
                                    <option value="{{ $gender }}"
                                            {{ old('gender',$job->gender) == $gender ? "selected":"" }}
                                    >{{ $gender }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))
                                <span class='help-block'>{{ $errors->first('gender') }}</span>
                            @endif
                        </div>

                        <div class="form-group @error('experience_level') has-error @enderror">
                            <label for="experience_level">experience_level</label>
                            <select name="experience_level" id="experience_level" class="form-control">
                                <option value="">Select a experience_level</option>
                                @foreach(['medium','entry','senior'] as $el)
                                    <option value="{{ $el }}"
                                            {{ old('experience_level',$job->experience_level) == $el ? "selected":"" }}
                                    >{{ ucfirst($el) }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('experience_level'))
                                <span class='help-block'>{{ $errors->first('experience_level') }}</span>
                            @endif
                        </div>

                        <div class="form-group @error('job_type') has-error @enderror">
                            <label for="job_type">Job Type</label>
                            <select name="job_type" id="job_type" class="form-control">
                                <option value="">Select a Job Type</option>
                                @foreach(['part_time' => 'Part Time',
                                           'full_time' => 'Full Time',
                                           'contract' => 'Contract',
                                           'temporary' => 'Temporary',
                                           'commission' => 'Commission',
                                           'internship' => 'Internship'] as $k=>$v)
                                    <option value="{{ $k }}"
                                            {{ old('job_type',$job->job_type) == $k ? "selected":"" }}
                                    >{{ $v }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('job_type'))
                                <span class='help-block'>{{ $errors->first('job_type') }}</span>
                            @endif
                        </div>


                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
