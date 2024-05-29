@extends('layout')
@section('main')

    <div class="flex-grow-1 p-3 text-center">
        <h2>Товары</h2>
        @foreach($categories as $category)
            <h3 >{{ $category->name }}</h3>
            <div class="d-flex flex-wrap ">
                @foreach($products->where('category_id', $category->image) as $product)
                    <div class="card m-3" style="width: 150px; ">
                        <a href="{{ url('/tovar/'.$product->id)  }}">
                        <img src="{{ $product->image }}" class="card-img-top" alt="Product Image" style="width: 150px; height: 200px;" >
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            </a>
                            <p class="card-text">Цена: {{ $product->price }} ₽</p>
                            <form action="/add-to-cart" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 100px;">
                                </div>
                                <button class="btn btn-primary" type="submit">Добавить в корзину</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection