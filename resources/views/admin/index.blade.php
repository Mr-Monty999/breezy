@extends('layouts.dashboard')


@section('title')
    <h1>الخصوصية</h1>
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('admin.update') }}" method="POST"
            class=" d-flex flex-column justify-content-center align-items-center">
            @csrf
            @method('PUT')
            <div class="form-group" style="margin-bottom:10px">
                <label for="">اسم الادمن :</label>
                <input type="text" name="username" value="{{ $admin->username }}" class="form-control">
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label for="">كلمة المرور :</label>
                <input type="text" name="password" value="" placeholder="كلمة مرور جديدة" class="form-control">
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
