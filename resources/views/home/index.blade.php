@extends('layouts.basic')


@section('main')
    <section class=" welcome" id="welcome">
        <article class="center-column">
            <p class="title">{{ $data['home_title'] }} </p>
        </article>
    </section>
    <section class="pricing center-column" id="prices">
        @if ($data['site_photo'] != null)
            <img class="" style="width: 200px;height:200px; border-radius: 10px"
                src='{{ asset("$data->site_photo") }}' alt="">
        @endif

    </section>
@endsection
