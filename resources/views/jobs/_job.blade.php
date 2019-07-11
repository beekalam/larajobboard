<div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
    <div class="col-md-2">
        <a href="job-single.html">
            <img src="/images/featured-listing-1.jpg" alt="Image"
                 class="img-fluid">
        </a>
    </div>
    <div class="col-md-4">
        <span class="badge badge-primary px-2 py-1 mb-3">{{ ucfirst($job->job_type) }}</span>
        <h2><a href="job-single.html">{{ $job->title }}</a></h2>
        <p class="meta">Publisher: <strong>John Stewart</strong> In:
            <strong>{{ ucfirst($job->category->name) }}</strong></p>
    </div>
    <div class="col-md-3 text-left">
        <h3>{{ ucfirst($job->city_name) }}</h3>
        <span class="meta">{{ strtoupper($job->country_name) }}</span>
    </div>
    <div class="col-md-3 text-md-right">
        <strong class="text-black">$60k &mdash; $100k</strong>
    </div>
</div>