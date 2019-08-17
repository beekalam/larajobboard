@extends('layouts.app')

@section('content')
    @include('layouts._overlay')
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">{{ $jobs->count() }} Jobs found  {{ empty($search_term) ? "": "for " . $search_term }}</h2>
                </div>
            </div>

            <div class="mb-5">
                @foreach($jobs as $job)
                    @include('jobs._job',['job' => $job])
                @endforeach
            </div>
            {{ $jobs->links() }}
        </div>
    </div>
@endsection