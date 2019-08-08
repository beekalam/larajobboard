@extends('layouts.app')

@section('content')
    {{--    @include('layouts._search')--}}
    {{--    @include('layouts._stats')--}}
    @include('layouts._overlay')

    <section class="site-section">
        <div class="container">
            <div class="row mb-5">

                @foreach($posts as $post)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="/blog/{{ $post->id }}">
                            <img src="{{ asset('storage/blog_images/'.$post->feature_image) }}" alt=""
                                 class="img-fluid rounded mb-4">
                        </a>

                        <h3><a href="/blog/{{ $post->id }}" class="text-black">{{ $post->title }}</a></h3>
                        <div>{{ $post->created_at->format('Y-m-d') }} <span class="mx-2">|</span> <a href="#">2
                                Comments</a></div>
                    </div>
                @endforeach

            </div>
            {{ $posts->links() }}

        </div>
    </section>

@endsection
