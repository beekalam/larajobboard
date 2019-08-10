@extends('layouts.app')

@section('content')
    @include('layouts._overlay')
    <div class="container">
        <div class="row justify-content-center">
            <form action="/jobs/{{ $job->id }}/apply" enctype="multipart/form-data" id="applyJob" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"> Online job application form </h5>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label" for="name"> Name: </label>
                        <input class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" placeholder="Your name" type="text"
                               value="{{ old('name') }}"/>
                        @error('name')
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="control-label" for="email">
                            E-Mail:
                        </label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email"
                               name="email" placeholder="i.e. you@gmail.com" type="text"
                               value="{{ old('email') }}"/>

                        @if($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group ">
                        <label class="control-label" for="phone_number"> Phone Number: </label>
                        <input class="form-control @error('phone_number') is-invalid @enderror"
                               id="phone_number" name="phone_number" placeholder="Phone Number"
                               type="text" value="{{ old("phone_number") }}"/>
                        @if($errors->has('phone_number'))
                           <div class="invalid-feedback">{{ $errors->first('phone_number')}} </div>
                        @endif
                    </div>

                    <div class="form-group ">
                        <label class="control-label" for="message-text"> Message: </label>
                        <textarea class="form-control"
                                  id="message" name="message"
                                  placeholder="Write your message here">{{ old('message') }}</textarea>
                    </div>

                    <div class="form-group ">
                        <label class="control-label" for="resume"> Resume: </label>
                        <input class="form-control @error('resume') is-invalid @enderror"
                               id="resume" name="resume" type="file">
                        <p class="text-muted"> File types: pdf,doc,docx </p>
                        @if($errors->has('resume'))
                            <div class="invalid-feedback">{{ $errors->first('resume') }}</div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" id="report_ad" type="submit"> Apply Online</button>
                </div>

            </form>
        </div>
    </div>
@endsection
