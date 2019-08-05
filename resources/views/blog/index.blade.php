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
                <img src="images/sq_img_1.jpg" alt="" class="img-fluid rounded mb-4">
            </a>

            <h3><a href="/blog/{{ $post->id }}" class="text-black">{{ $post->title }}</a></h3>
            <div>{{ $post->created_at->format('Y-m-d') }} <span class="mx-2">|</span> <a href="#">2 Comments</a></div>
          </div>
          @endforeach

{{--           <div class="col-md-6 col-lg-4 mb-5">
            <a href="blog-single.html"><img src="images/sq_img_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid rounded mb-4"></a>
            <h3><a href="blog-single.html" class="text-black">How to Write a Creative Cover Letter</a></h3>
            <div>April 15, 2019 <span class="mx-2">|</span> <a href="#">2 Comments</a></div>
          </div>
 --}}          
        </div>
        <div class="row pagination-wrap mt-5">
    
          <div class="col-md-12 text-center ">
            <div class="custom-pagination ml-auto">
              <a href="#" class="prev">Previous</a>
              <div class="d-inline-block">
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
              </div>
              <a href="#" class="next">Next</a>
            </div>
          </div>
        </div>
    
      </div>
    </section>

@endsection
