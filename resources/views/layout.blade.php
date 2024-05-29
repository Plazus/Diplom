<!DOCTYPE html>
<html data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .body-style{
          display: flex;
          justify-content: center;
          align-items: center;
 

        }
        .body-color {
            background: -webkit-linear-gradient(0deg, rgba(255,255,255,1) 0, rgba(255,255,255,1) 23%, rgba(45,94,191,1) 23%, rgba(45,94,191,1) 77%, rgba(255,255,255,1) 77%, rgba(255,255,255,1) 100%);
            background: -moz-linear-gradient(90deg, rgba(255,255,255,1) 0, rgba(255,255,255,1) 23%, rgba(45,94,191,1) 23%, rgba(45,94,191,1) 77%, rgba(255,255,255,1) 77%, rgba(255,255,255,1) 100%);
            background: linear-gradient(90deg, rgba(255,255,255,1) 0, rgba(255,255,255,1) 23%, rgba(45,94,191,1) 23%, rgba(45,94,191,1) 77%, rgba(255,255,255,1) 77%, rgba(255,255,255,1) 100%);
        }

        .header-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .header-link {
            margin-right: 10px;
        }
        .header-button {
            margin-left: 10px;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;

            height: 80vh;
        }
        .form-wrapper {
            max-width: 400px;
            width: 100%;
            padding: 20px;

        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class=" body-color ">
    <header class="mb-auto body-style  text-white">
        <div class="header-container p-3 mx-auto  border-bottom">
            <a href="/main" class="header-link me-3 py-2 link-body-emphasis ">
                <span class="fs-4 ">Главная</span>
            </a>
            <a class="header-link me-3 py-2 link-body-emphasis" href="/catalog">Каталог</a>
            <a class="header-link me-3 py-2 link-body-emphasis " href="/contacts">Контакты</a>
            <a class="header-link me-3 py-2 link-body-emphasis " href="/delivery">Доставка</a>
            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                @if (Auth::check())
                    <a class="btn btn-outline-warning header-button " href="/personal">Личный кабинет</a>
                @else
                    <a class="btn btn-outline-warning header-button " href="/logn">Войти</a>
                @endif
                <a class="btn btn-outline-warning header-button " href="/basket">Корзина</a>
            </nav>
        </div>
    </header>
@yield('main')
</body>
</html>