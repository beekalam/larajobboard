@extends('layouts.app')

@section('content')
    {{--    @include('layouts._search')--}}
    {{--    @include('layouts._stats')--}}
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Jobs</h2>
                </div>
            </div>

            <div class="mb-5">
                @foreach($jobs as $job)
                    @include('jobs._job')
                @endforeach
            </div>

        </div>
    </div>
    {{--    @include('layouts._jobs')--}}
    {{--    @include('layouts._candidates')--}}
    {{--    @include('layouts._testimonials')--}}
    {{--    @include('layouts._signup')--}}

@endsection
