@extends('layouts.dashboard')


@section('title')
    <h1>المنتجات</h1>
@endsection
@section('content')
    <div class="container">
        @if ($items->count() > 0)
            <form action="{{ route('product.store') }}" method="POST"
                class=" d-flex flex-column justify-content-center align-items-center">
                @csrf
                <div class="form-group" style="margin-bottom:10px">
                    <label for="">اسم المنتج :</label>
                    <input type="text" name="product_name" placeholder="اسم المنتج" class="form-control">
                </div>
                <div class="form-group" style="margin-bottom:10px">
                    <label for="">سعر المنتج :</label>
                    <input type="text" name="product_price" placeholder="السعر" class="form-control">
                </div>
                <div class="form-group" style="margin-bottom:10px">
                    <label for="">صنف المنتج :</label>
                    <select class="form-control" name="item_id" id="">
                        @foreach ($items as $item)
                            <option class="form-control" value="{{ $item->id }}">{{ $item->item_name }}</option>
                        @endforeach

                    </select>
                </div>
                <button type="submit" style="margin-bottom: 10px" class="btn btn-primary">اضافة</button>
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
            @if ($products->count() > 0)
                <table class="table" style="margin-top: 100px">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">الرقم</th>
                            <th scope="col">اسم المنتج</th>
                            <th scope="col">سعر المنتج</th>
                            <th scope="col">صنف المنتج</th>
                            <th scope="col">الاحداث</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td class="">{{ $product->product_name }}</td>
                                <td class="">{{ $product->product_price }}</td>
                                <td class="">{{ $product->item->item_name }}</td>
                                <td class="">
                                    <form class="row gap-2" action="{{ route('product.delete', $product->id) }}"
                                        method="POST">
                                        <a class="btn btn-dark  col-lg-3 col-6 d-flex justify-content-center align-items-center"
                                            href="{{ route('product.edit', ['id' => $product->id]) }}"
                                            style="margin-left: 10px">تعديل</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger  col-lg-3 col-6 d-flex justify-content-center align-items-center">حذف</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $products->links() }}
            @endif
        @else
            <div class="alert bg-danger text-center text-white">الرجاء اضافة اصناف اولا !</div>
        @endif
    </div>
@endsection
