@extends('layouts.dashboard')


@section('title')
    <h1>المنتجات</h1>
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('product.update', $product->id) }}" method="POST"
            class=" d-flex flex-column justify-content-center align-items-center">
            @csrf
            @method('PUT')
            <div class="form-group" style="margin-bottom:10px">
                <label for="">اسم المنتج :</label>
                <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control">
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label for="">سعر المنتج :</label>
                <input type="text" name="product_price" value="{{ $product->product_price }}" class="form-control">
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label for="">صنف المنتج :</label>
                <select class="form-control" name="item_id" id="">
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $product->item_id) selected @endif>
                            {{ $item->item_name }}</option>
                    @endforeach

                </select>
            </div>
            <div>
                <button type="submit" style="margin-bottom: 10px" class="btn btn-primary">تعديل</button>
                <a type="submit" href="{{ route('product.index') }}" style="margin-bottom: 10px"
                    class="btn btn-dark">رجوع</a>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
        </form>


    </div>
@endsection
