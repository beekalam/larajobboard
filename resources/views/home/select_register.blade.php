@extends('layouts.app')
@section('content')
    @include('layouts._overlay')
    <section class="site-section services-section bg-light block__62849" id="next-section">
        <div class="container">

            <div class="row">
                <div class="col-6 col-md-6 col-lg-4 mb-4 mb-lg-5">

                    <a href="/job-seeker-register" class="block__16443 text-center d-block">
                        <span class="custom-icon mx-auto"><span class="icon-user-plus d-block"></span></span>
                        <h3>Job Seeker</h3>
                        <p>Create an account to find and apply job.</p>
                    </a>

                </div>
                <div class="col-6 col-md-6 col-lg-4 mb-4 mb-lg-5">

                    <a href="/employer-register" class="block__16443 text-center d-block">
                        <span class="custom-icon mx-auto"><span class="icon-black-tie d-block"></span></span>
                        <h3>Employer</h3>
                        <p>Create account to Post jobs.</p>
                    </a>

                </div>
            </div>


        </div>
    </section>
@endsection