@extends('layout')
@section('main')
<div class="form-container " >
        <div class="form-wrapper">
            <form class="text-center">
            <img src="https://yandex.ru/images/search?img_url=https%3A%2F%2Fstatic.wikia.nocookie.net%2Fbakugan%2Fimages%2F7%2F73%2FCropped_DiveFujou.jpg%2Frevision%2Flatest%3Fcb%3D20121029170736&lr=213&pos=0&rpt=simage&source=serp&text=ффото%20бакугана" alt="" width="50" height="50">
                <h1 class="form-title ">Регистрация</h1>

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating text-white">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Имя</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating text-white">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Почта</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating text-white">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Логин</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating text-white">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Пароль</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating text-white">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Номер телефона</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating text-white">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Повторите пароль</label>
                        </div>
                    </div>
                </div>

                <div class="form-check text-start  my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Запомнить
                    </label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Зарегистрироваться</button>
               
                <p class="mt-5 mb-3 text-body-secondary ">©</p>

            </form>
        </div>
    </div>
@endsection