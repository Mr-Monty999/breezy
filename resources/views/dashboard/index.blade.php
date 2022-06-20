@extends('layouts.dashboard')


@section('title')
    <h1>لوحة التحكم</h1>
@endsection
@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center gap-4">
        <h1>مرحبا بك ,{{ Auth::guard('admin')->user()->username }}</h1>
        <div style="width: 250px; min-height: 80px; border-radius: 10px;"
            class="bg-success d-flex flex-column justify-content-center align-items-center text-white">
            <h4>عدد الزوار :</h4>
            <h3>{{ $data['vistors_count'] }}</h3>
        </div>
    </div>
@endsection
