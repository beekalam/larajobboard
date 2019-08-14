<div class="form-group @error('title') has-error @enderror">
    <label for="title" class="col-sm-2">Title</label>
    <div class="col-sm-10">
        <input type="text" name="title" id="title"
               value="{{ old('title',$job->title) }}"
               placeholder="Title" class="form-control">
        @if($errors->has('title'))
            <span class='help-block'>{{ $errors->first('title') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('position') has-error @enderror">
    <label for="position" class="col-sm-2">Position</label>
    <div class="col-sm-10">
        <input type="text" name="position" id="position"
               value="{{ old('position',$job->position) }}"
               placeholder="Position" class="form-control">
        @if($errors->has('position'))
            <span class='help-block'>{{ $errors->first('position') }}</span>
        @endif
    </div>
</div>


<div class="form-group @error('category') has-error @enderror">
    <label for="category" class="col-sm-2">Category</label>
    <div class="col-sm-10">
        <select name="category" id="category" class="form-control">
            <option value="">Select a Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                        {{ old('category',(isset($job->category) ? $job->category->id:'')) == $category->id ? "selected":"" }}
                >{{ $category->name }}</option>
            @endforeach
        </select>
        @if($errors->has('category'))
            <span class="help-block">{{ $errors->first('category') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('cycle') has-error @enderror">
    <label for="cycle" class="col-sm-2">Cycle</label>
    <div class="col-sm-10">
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
</div>

<div class="form-group @error('salary') has-error @enderror">
    <label for="salary" class="col-sm-2">Salary</label>
    <div class="col-sm-10">
        <input type="number" name="salary" id="salary"
               value="{{ old('salary',$job->salary) }}"
               class="form-control">
        @if($errors->has('salary'))
            <span class='help-block'>{{ $errors->first('salary') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('salary_max') has-error @enderror">
    <label for="salary_max" class="col-sm-2">Salary Upto</label>
    <div class="col-sm-10">
        <input type="text" name="salary_max" id="salary_max"
               value="{{ old('salary_max',$job->salary_max) }}"
               placeholder="" class="form-control">
        @if($errors->has('salary_max'))
            <span class='help-block'>{{ $errors->first('salary_max') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('currency') has-error @enderror">
    <label for="currency" class="col-sm-2">Currency</label>
    <div class="col-sm-10">
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
</div>

<div class="form-group @error('gender') has-error @enderror">
    <label for="gender" class="col-sm-2">Gender</label>
    <div class="col-sm-10">
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
</div>

<div class="form-group @error('experience_level') has-error @enderror">
    <label for="experience_level" class="col-sm-2">Experience level</label>
    <div class="col-sm-10">
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
</div>

<div class="form-group @error('job_type') has-error @enderror">
    <label for="job_type" class="col-sm-2">Job Type</label>
    <div class="col-sm-10">
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

<div class="form-group @error('experience_required_years') has-error @enderror">
    <label for="experience_required_years" class="col-sm-2">Experience Required(years)</label>
    <div class="col-sm-10">
        <input type="number" name="experience_required_years" id="experience_required_years"
               value="{{ old('experience_required_years',$job->experience_required_years) }}"
               placeholder="" class="form-control">
        @if($errors->has('experience_required_years'))
            <span class='help-block'>{{ $errors->first('experience_required_years') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('deadline') has-error @enderror">
    <label for="deadline" class="col-sm-2">Deadline</label>
    <div class="col-sm-10">
        <input type="date" name="deadline" id="deadline"
               value="{{ old('deadline',isset($job->deadline) ? $job->deadline->format('Y-m-d') : '') }}"
               placeholder="Deadline" class="form-control">
        @if($errors->has('deadline'))
            <span class='help-block'>{{ $errors->first('deadline') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('description') has-error @enderror">
    <label for="description" class="col-sm-2">description</label>
    <div class="col-sm-10">
    <textarea name="description" id="description"
              class="form-control"
              cols="30" rows="3">{{old('description',$job->description)}}</textarea>
        @if($errors->has('description'))
            <span class='help-block'>{{ $errors->first('description') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('skills') has-error @enderror">
    <label for="skills" class="col-sm-2">Skills</label>
    <div class="col-sm-10">
    <textarea name="skills" id="skills" cols="30" rows="3"
              class="form-control">{{ old('skills',$job->skills) }}</textarea>
        @if($errors->has('skills'))
            <span class='help-block'>{{ $errors->first('skills') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('responsibilities') has-error @enderror">
    <label for="responsibilities" class="col-sm-2">Responsibilities</label>
    <div class="col-sm-10">
    <textarea name="responsibilities" id="responsibilities" cols="30" rows="3"
              class="form-control">{{ old('responsibilities',$job->responsibilities) }}</textarea>
        @if($errors->has('responsibilities'))
            <span class='help-block'>{{ $errors->first('responsibilities') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('educational_requirements') has-error @enderror">
    <label for="educational_requirements" class="col-sm-2">Educational requirements</label>
    <div class="col-sm-10">
    <textarea name="educational_requirements" id="educational_requirements" cols="30" rows="3"
              class="form-control">{{ old('educational_requirements',$job->educational_requirements) }}</textarea>
        @if($errors->has('educational_requirements'))
            <span class='help-block'>{{ $errors->first('educational_requirements') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('experience_requirements') has-error @enderror">
    <label for="experience_requirements" class="col-sm-2">Experience requirements</label>
    <div class="col-sm-10">
    <textarea name="experience_requirements" id="experience_requirements" cols="30" rows="3"
              class="form-control">{{ old('experience_requirements',$job->experience_requirements) }}</textarea>
        @if($errors->has('experience_requirements'))
            <span class='help-block'>{{ $errors->first('experience_requirements') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('additional_requirements') has-error @enderror">
    <label for="additional_requirements" class="col-sm-2">Additional requirements</label>
    <div class="col-sm-10">
    <textarea name="additional_requirements" id="additional_requirements" cols="30" rows="3"
              class="form-control">{{ old('additional_requirements',$job->additional_requirements) }}</textarea>
        @if($errors->has('additional_requirements'))
            <span class='help-block'>{{ $errors->first('additional_requirements') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('benefits') has-error @enderror">
    <label for="benefits" class="col-sm-2">Benefits</label>
    <div class="col-sm-10">
    <textarea name="benefits" id="benefits" cols="30" rows="3"
              class="form-control">{{ old('benefits',$job->benefits) }}</textarea>
        @if($errors->has('benefits'))
            <span class='help-block'>{{ $errors->first('benefits') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('apply_instructions') has-error @enderror">
    <label for="apply_instructions" class="col-sm-2">Apply instructions</label>
    <div class="col-sm-10">
    <textarea name="apply_instructions" id="apply_instructions" cols="30" rows="3"
              class="form-control">{{ old('apply_instructions',$job->apply_instructions) }}</textarea>
        @if($errors->has('apply_instructions'))
            <span class='help-block'>{{ $errors->first('apply_instructions') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="anywhere_location" class="col-sm-2">Can apply from Anywhere?</label>
    <div class="col-sm-10">
        <input type="checkbox" name="anywhere_location" id="anywhere_location" >
    </div>
</div>

<div class="form-group @error('country') has-error @enderror">
    <label for="country" class="col-sm-2">Country</label>
    <div class="col-sm-10">
        <select name="country" id="country" class="form-control">
            <option value="">Select a country</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}"
                        {{ old('country','todo') == $country->id ? "selected":"" }}
                >{{ $country->country_name }}</option>
            @endforeach
        </select>
        @if($errors->has('country'))
            <span class='help-block'>{{ $errors->first('country') }}</span>
        @endif
    </div>
</div>

<div class="form-group @error('state') has-error @enderror">
    <label for="state" class="col-sm-2">state</label>
    <div class="col-sm-10">
        <select name="state" id="state" class="form-control">
            <option value="">Select a state</option>
        </select>
        @if($errors->has('state'))
            <span class='help-block'>{{ $errors->first('state') }}</span>
        @endif
    </div>
</div>


@section('scripts')
    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                let country_id = this.value;
                $.ajax({
                    type: "GET",
                    url: `/${country_id}/states`,
                    success: function (countries) {
                        var options = "<option value=''>select a state</option>\n";
                        for (var i = 0; i < countries.length; i++) {
                            options += "<option value='"+ countries[i]['id']+"'>" + countries[i]['state_name'] + "</option>\n";
                        }
                        $('#state').html(options);
                    }
                });

            });
        });
    </script>
@endsection

