@extends('layouts.app')

@section('content')
    {{--    @include('layouts._search')--}}
    {{--    @include('layouts._stats')--}}
    @include('layouts._overlay')
    <section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 blog-content">

            <h3 class="mb-4">{{ $post->title }}</h3>
            {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda nihil aspernatur nemo sunt, --}}
              {{-- qui, harum repudiandae quisquam eaque dolore itaque quod tenetur quo quos labore?</p> --}}
            <p>
              <img src="{{ asset('storage/blog_images/' . $post->feature_image) }}" 
                alt="" class="img-fluid rounded">
            </p>
              {{ $post->content }}
          </div>
      
        </div>
      </div>
    </section>
@endsection
