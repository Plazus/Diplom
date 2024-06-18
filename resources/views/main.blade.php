@extends('layout')
@section('main')
<div class="container" >
    <h1 class=" text-center flex-grow-1 p-3 fs-3">Лучшие товары</h1>
    <div class="row" >
        @foreach ($uniqueProducts as $product)
            <div class="col-md-4 mb-4" style="max-width: 200px; ">
            <a href="{{ url('/tovar/'.$product->product)  }}">
                <div class="card">
                    <img src="{{ $product->product_image }}" alt="Product Image" style="max-width: 230px; max-height: 230px;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        {{-- Оценка товара --}}
                        @php
                            $averageRating = $averageRatings[$product->product_id] ?? 0;
                            $roundedRating = round($averageRating);
                        @endphp
                        <p class="card-text">Оценка: 
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $roundedRating)
                                    <span class="text-warning">&#9733;</span>
                                @else
                                    <span class="text-muted">&#9733;</span>
                                @endif
                            @endfor
                        </p>
                        @php
                            $sameProductReviews = $filteredReviews->where('product_id', $product->product_id);
                        @endphp
                        @if ($sameProductReviews->isNotEmpty())
                            <p class="card-text">Количество отзывов: {{ $sameProductReviews->count() }}</p>
                        @endif
                        <form action="/add-to-cart" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="m-2 d-flex " >
                                <input style="max-width: 140px;" type="number" name="quantity" value="1" min="1" class="text-center"  >
                            </div>
                            <button class="btn btn-primary" type="submit">Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="b-example-divider b-example-vr"></div>
<div class="container mt-4  d-flex align-items-center text-white text-decoration-none "  style="max-width: 1000px; max-height: 300px;" >
    <div class="row justify-content-center " >
        <div class="col-md-6">
            <h4>Молодежная</h4>
            <p>Адрес:</p>
            <p>Москва, ул Горбунова, 12, корп 2, территория "МИРУС АВТО"</p>
        </div>
        <div class="col-md-6">
            <h4>Контакты:</h4>
            <p>телефон офис: 8 800 301 90 19 (бесплатно), 8-495-090 99 30</p>
            <p>телефон опт. отдел: +7(903)733-04-44</p>
            <p>телефон: +7(901) 347-78-17</p>
            <p>пн-пт 09:00-20:00</p>
        </div>
    </div>
</div>
@endsection