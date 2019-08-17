@extends('layouts.app')

@section('content')
    {{--    @include('layouts._search')--}}
    {{--    @include('layouts._stats')--}}
    @include('layouts._overlay')

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 blog-content">
                <h3 class="mb-4">{{ $page->title }}</h3>
                <p>
                </p>
                    {{ $page->content }}
                </div>
            </div>
        </div>
    </section>
@endsection
