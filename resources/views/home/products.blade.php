@extends('layouts.basic')


@section('main')
    <section class=" welcome" id="welcome">
        <article class="center-column">
            <p class="title">أسعد الله مسأكم منورين المتجر </p>
        </article>
    </section>
    <section class="pricing center-column" id="prices">
        <p class="title">{{ $item_name }}</p>
        @if ($products->count() <= 0)
            <div class="alert alert-danger">لايوجد منتجات</div>
        @endif
        <div class="items container">
            @foreach ($products as $product)
                <div class='mycard center-column'>
                    <img src='{{ asset($product->item->item_photo) }}' alt="">
                    <p class="offerName title">{{ $product->product_name }}</p>
                    <p class="price text">{{ $product->product_price }}</p>
                    <a class="button" target="_blank"
                        href="https://wa.me/{{ $site['phone'] }}?text=اريد شراء {{ $product->product_name }}"
                        class=" d-flex flex-column">
                        <p>شراء </p>
                        <p class="fas fa-shopping-cart"> </p>
                    </a>
                </div>
            @endforeach

        </div>
        {{ $products->links() }}

    </section>
@endsection
