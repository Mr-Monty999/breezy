@extends('layouts.dashboard')


@section('title')
    <h1>الاصناف</h1>
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('item.store') }}" enctype="multipart/form-data" method="POST"
            class="d-flex flex-column justify-content-center align-items-center">
            @csrf
            <div class="form-group" style="margin-bottom:10px">
                <label for="">اسم الصنف :</label>
                <input type="text" name="item_name" placeholder="اسم الصنف" class="form-control">
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label for="">صورة الصنف :</label>
                <input type="file" name="item_photo" class="form-control">
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
        @if ($items->count() > 0)
            <table class="table" style="margin-top: 100px">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">الرقم</th>
                        <th scope="col">اسم الصنف</th>
                        <th scope="col">صورة الصنف</th>
                        <th scope="col">الاحداث</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($items as $item)
                        <tr class="">
                            <th scope="row">{{ ++$i }}</th>
                            <td class="">{{ $item->item_name }}</td>
                            <td class="">
                                @if ($item->item_photo != null)
                                    <img style="border-radius: 50%" width="80px" height="80px"
                                        src="{{ asset($item->item_photo) }}" alt="">
                                @else
                                    لايوجد صورة
                                @endif

                            </td>

                            <td class="">
                                <form class="row" action="{{ route('item.delete', $item->id) }}" method="POST">
                                    <a class="btn btn-dark  col-lg-3 col-6 d-flex justify-content-center align-items-center"
                                        href="{{ route('item.edit', $item->id) }}"
                                        style="margin-left: 10px;margin-bottom: 10px">تعديل</a>
                                    @csrf
                                    @method('DELETE')
                                    <button style="margin-bottom: 10px" type="submit"
                                        class="col-lg-3 col-6 btn btn-danger d-flex justify-content-center align-items-center">حذف</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $items->links() }}
        @endif

    </div>
@endsection
