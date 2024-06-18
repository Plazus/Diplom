<!DOCTYPE html>
<html data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Незамерзни</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewpoint" content="width-device-width">
    <meta name="description" content="Если хочешь закупиться качественными товарами для своей машины, то выбор сделан верно">
    <meta name="keywords" content="Незамерзайка, Антифриз">
    <style>
        .body-style{
          display: flex;
          justify-content: center;
          align-items: center;
 

        }
        .body-color {
            background-color:#6360e0;
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
        .footer {
            margin-top: auto;
        }
        
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 0rem;
        height: 50vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
</head>
<body class=" body-color ">
    <header class="mb-auto body-style  text-white">
        <div class="header-container p-3 mx-auto  border-bottom">
            <a href="/" class="header-link me-3 py-2 link-body-emphasis ">
                <span class="fs-4 ">Главная</span>
            </a>
            <a class="header-link me-3 py-2 link-body-emphasis" href="/catalog">Каталог</a>
            <a class="header-link me-3 py-2 link-body-emphasis " href="/contacts">Контакты</a>
            <a class="header-link me-3 py-2 link-body-emphasis " href="/delivery">Доставка</a>
            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                @if (Auth::check())
                    <a class="btn btn-outline-warning header-button " href="/personal">Личный кабинет</a>
                @else
                    <a class="btn btn-outline-warning header-button " href="/login">Войти</a>
                @endif
                <a class="btn btn-outline-warning header-button " href="/basket">Корзина</a>
            </nav>
        </div>
    </header>
</body>
@yield('main')

</html>