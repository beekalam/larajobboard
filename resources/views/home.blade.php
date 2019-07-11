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
                    @php $index = 0; @endphp
                    @foreach($categories as $category)
                        @if($index == 0 || $index % 6 == 0)
                            <div class="col-md-3 ftco-animate">
                                <ul class="category">
                                    @endif
                                    <li>
                                        <a href="/cat/{{$category->id}}">{{ $category->name }}
                                            <br><span class="number">{{ $category->jobsCount }}</span>
                                            <span>Open position</span><i class="ion-ios-arrow-forward"></i>
                                        </a>
                                    </li>
                                    @if($index == 0 || $index % 6 == 0)
                                </ul>
                            </div>
                        @endif
                        @php $index++; @endphp
                    @endforeach
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            var contentWayPoint = function () {
                var i = 0;
                $('.ftco-animate').waypoint(function (direction) {

                    if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

                        i++;

                        $(this.element).addClass('item-animate');
                        setTimeout(function () {

                            $('body .ftco-animate.item-animate').each(function (k) {
                                var el = $(this);
                                setTimeout(function () {
                                    var effect = el.data('animate-effect');
                                    if (effect === 'fadeIn') {
                                        el.addClass('fadeIn ftco-animated');
                                    } else if (effect === 'fadeInLeft') {
                                        el.addClass('fadeInLeft ftco-animated');
                                    } else if (effect === 'fadeInRight') {
                                        el.addClass('fadeInRight ftco-animated');
                                    } else {
                                        el.addClass('fadeInUp ftco-animated');
                                    }
                                    el.removeClass('item-animate');
                                }, k * 50, 'easeInOutExpo');
                            });

                        }, 100);

                    }

                }, {offset: '95%'});
            };
            contentWayPoint();
        });
    </script>
@endsection
