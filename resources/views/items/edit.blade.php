@extends('layouts.dashboard')


@section('title')
    <h1>الاصناف</h1>
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('item.update', $item->id) }}" enctype="multipart/form-data" method="POST"
            class="d-flex flex-column justify-content-center align-items-center">
            @csrf
            @method('PUT')
            <div class="form-group" style="margin-bottom:10px">
                <label for="">اسم الصنف :</label>
                <input type="text" name="item_name" value="{{ $item->item_name }}" class="form-control">
            </div>
            <img style="width: 100px;height:100px ; border-radius: 50%" src="{{ asset($item->item_photo) }}"
                alt="No Image">
            <div class="form-group" style="margin-bottom:10px">
                <label for="">صورة الصنف :</label>
                <input type="file" name="item_photo" class="form-control">
            </div>
            <div>
                <button type="submit" style="margin-bottom: 10px" class="btn btn-primary">تعديل</button>
                <a type="submit" href="{{ route('item.index') }}" style="margin-bottom: 10px"
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
