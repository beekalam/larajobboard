@extends('layouts.app')

@section('content')
    @include('layouts._search')
    @include('layouts._stats')
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Categories</h2>
                </div>
            </div>

            <div class="mb-5">
                <div class="row">
                    <ul class="">
                        @foreach($categories as $category)
                            <li>
                                <a href="/cat/{{ $category->id }}">
                                    {{ $category->name }}
                                </a>
                                <span>
                                    ( {{ $category->jobs()->count() }} )
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
    {{--    @include('layouts._jobs')--}}
    {{--    @include('layouts._candidates')--}}
    {{--    @include('layouts._testimonials')--}}
    {{--    @include('layouts._signup')--}}

@endsection
