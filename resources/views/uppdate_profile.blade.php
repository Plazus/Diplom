@extends('personal')
@section('start')
<div class="container">
    <h1 class="mt-4 text-center">Профиль пользователя</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action='/update-profile' method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                </div>
                <div class="form-group">
                    <label for="name">Имя:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}">
                </div>
                <div class="form-group">
                    <label for="password">Новый пароль:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Подтвердите новый пароль:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="current_password">Текущий пароль:</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                </div>
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </form>
        </div>
    </div>
</div>
@endsection