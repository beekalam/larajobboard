@extends('layouts.app')

@section('content')
    {{--    @include('layouts._search')--}}
    {{--    @include('layouts._stats')--}}
    @include('layouts._overlay')

    <section class="site-section">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                       {{ $success }}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
