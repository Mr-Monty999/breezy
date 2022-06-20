@extends('layouts.dashboard')


@section('title')
    <h1>الاعدادات</h1>
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('setting.update') }}" enctype="multipart/form-data" method="POST"
            class=" d-flex flex-column justify-content-center align-items-center">
            @csrf
            @method('PUT')

            <div>
                <div class="form-group" style="margin-bottom:10px">
                    <label for="">اسم الموقع :</label>
                    <input type="text" name="site_name" value="{{ $data['site_name'] }}" placeholder="اسم الموقع"
                        class="form-control">
                </div>
                <div class="form-group" style="margin-bottom:10px">
                    <label for="">رقم الهاتف :</label>
                    <input type="text" name="phone" value="{{ $data['phone'] }}" placeholder="رقم هاتف الواتس اب"
                        class="form-control">
                </div>
                <div class="form-group" style="margin-bottom:10px">
                    <label for="">صورة الصفحة الرئيسية :</label>
                    <input type="file" name="site_photo" class="form-control">
                </div>
                <div class="form-group" style="margin-bottom:10px">
                    <label for="">عنوان الصفحة الرئيسية :</label>
                    <textarea name="home_title" style="resize:none" class="form-control" id="" cols="30" rows="5">{{ $data['home_title'] }}</textarea>

                </div>

                <div class="form-group" style="margin-bottom:10px">
                    <label for="">شريط الاخبار:</label>
                    <textarea name="news" style="resize:none" class="form-control" id="" cols="30" rows="5">{{ $data['news'] }}</textarea>
                </div>
            </div>
            <button type="submit" style="margin-bottom: 10px" class="btn btn-warning">حفظ</button>
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
