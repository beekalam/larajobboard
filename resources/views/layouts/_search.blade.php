<section class="home-section section-hero overlay bg-image" style="background-image: url('/images/hero_1.jpg');"
         id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="mb-5 text-center">
                    <h1 class="text-white font-weight-bold">LaraJobBoard</h1>
                    <p>Find your dream job.</p>
                </div>

                <form method="get" class="search-jobs-form" action="/search">
                    <div class="row mb-5">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <input type="text" class="form-control form-control-lg"
                                   name="search_term"
                                   placeholder="Job title, keywords...">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select class="form-control" name="location">
                                <option value="anywhere">Anywhere</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->country_name }}">
                                        {{ $country->country_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <select class="form-control" name="job_type">
                                <option value="part_time">Part Time</option>
                                <option value="full_time">Full Time</option>
                                <option value="contract">Contract</option>
                                <option value="temporary">Temporary</option>
                                <option value="commission">Commision</option>
                                <option value="internship">Internship</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search">
                                <span class="icon-search icon mr-2"></span>Search Job
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</section>