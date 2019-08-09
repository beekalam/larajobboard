@extends('layouts.app')

@section('content')
    @include('layouts._overlay')
    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img src="/images/featured-listing-1.jpg" alt="">
                        </div>
                        <div>
                            <h2>{{ $job->title }}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>
                                    Puma
                                </span>
                                <span class="m-2"><span class="icon-room mr-2"></span>
                                    {{ $job->country_name . ' ' . ucfirst($job->city_name)}}
                                </span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span>
                                    <span class="text-primary">{{ $job->type }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <a href="#"
                               onclick="event.preventDefault();document.getElementById('favorite-form').submit()"
                               class="btn btn-block btn-light btn-md">
                                @if($job->is_favorited)
                                    <span class="icon-heart mr-2 text-danger"></span>Save Job
                                @else
                                    <span class="icon-heart-o mr-2 text-danger"></span>Save Job
                                @endif
                            </a>
                            <form id="favorite-form"
                                  method="POST"
                                  action="/jobs/{{ $job->id }}/{{$job->is_favorited ? 'unfavorite':'favorite'}}">
                                @csrf
                                @if($job->is_favorited)
                                    @method('DELETE')
                                @endif
                            </form>
                        </div>
                        <div class="col-6">
                            <a href="/jobs/{{ $job->id }}/apply" class="btn btn-block btn-primary btn-md">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    <div class="mb-5">
                        <figure class="mb-5"><img src="/images/sq_img_1.jpg"
                                                  alt=""
                                                  class="img-fluid rounded"></figure>
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary">
                            <span class="icon-align-left mr-3"></span>Job Description
                        </h3>
                        {{ $job->description }}
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-rocket mr-3"></span>Responsibilities</h3>
                        <ul class="list-unstyled m-0 p-0">
                            @foreach(explode("\n",$job->responsibilities) as $resp)
                                @if(!empty(trim($resp)))
                                    <li class="d-flex align-items-start mb-2"><span
                                                class="icon-check_circle mr-2 text-muted"></span>
                                        <span>{{ $resp }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary">
                            <span class="icon-book mr-3"></span>Education</h3>
                        <ul class="list-unstyled m-0 p-0">
                            @foreach(explode("\n",$job->educational_requirements) as $er)
                                @if(! empty(trim($er)))
                                    <li class="d-flex align-items-start mb-2">
                                        <span class="icon-check_circle mr-2 text-muted"></span>
                                        <span>{{ $er }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary">
                            <span class="icon-book mr-3"></span>Experience</h3>
                        <ul class="list-unstyled m-0 p-0">
                            @foreach(explode("\n", $job->experience_requirements) as $er)
                                @if(! empty(trim($er)))
                                    <li class="d-flex align-items-start mb-2">
                                        <span class="icon-check_circle mr-2 text-muted"></span>
                                        <span>{{ $er }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary">
                            <span class="icon-turned_in mr-3"></span>Other Benefits</h3>
                        <ul class="list-unstyled m-0 p-0">
                            @foreach(explode("\n", $job->benefits) as $benefit)
                                @if(! empty(trim($benefit)))
                                    <li class="d-flex align-items-start mb-2"><span
                                                class="icon-check_circle mr-2 text-muted"></span>
                                        <span>{{ $benefit }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2"><strong class="text-black">Published on:</strong>
                                {{ $job->created_at->format('Y-m-d') }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Vacancy:</strong> 20</li>
                            <li class="mb-2"><strong class="text-black">Employment Status:</strong>
                                {{$job->type}}
                            </li>
                            <li class="mb-2"><strong class="text-black">Experience:</strong>
                                {{ $job->experience_required_years }} {{ str_plural('year',$job->experience_required_years) }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Job Location:</strong>
                                {{ $job->location }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Salary:</strong>
                                {{ $job->min_max_salary }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Gender:</strong>
                                {{ ucfirst($job->gender) }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Application Deadline:</strong>
                                {{ $job->deadline->format('Y-m-d') }}
                            </li>
                        </ul>
                    </div>

                    <div class="bg-light p-3 border rounded">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                        <div class="px-3">
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
