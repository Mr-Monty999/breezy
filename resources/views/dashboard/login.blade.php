@extends('layouts.basic')
@section('main')
    <main class="container login">
        <div class="">
            <form action="{{ route('dashboard.login.submit') }}" method="post" class="center-column">
                @csrf
                <p class="title">لوحة التحكم</p>
                <div class="userName">
                    <label for="user">اسم المستخدم :</label>
                    <input type="text" class="form-control" id="user" name="username" placeholder="اسم المستخدم">
                </div>
                <div class="password">
                    <label for="pass">كلمة المرور :</label>
                    <input type="password" class="form-control" id="pass" name="password" placeholder="كلمة المرور">
                </div>
                <button class="btn btn-primary" type="submit">تسجيل دخول</button>
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

    </main>
@endsection
