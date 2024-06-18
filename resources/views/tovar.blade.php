@extends('layout')
@section('main')
<div class="flex-grow-1 p-3 text-center">
        <h2>{{ $product->name }}</h2>
        <img src="{{ $product->image }}" alt="Product Image" style="max-width: 300px; max-height: 300px;">
        <p>Цена: {{ $product->price }}</p>
        @if(Auth::check())
        <form action="{{ url('/tovar/'.$product->id.'/add-review') }}" method="POST">
            @csrf
            <div class="text-center">ОСТАВЬТЕ ОТЗЫВ</div>
            <label for="feedback">Отзыв:</label>
            <div class="form-floating mb-3">
                <textarea name="feedback" required></textarea>
            </div>
            <label for="evaluation">Оценка:</label>
            <div class="form-floating mb-3">
                <select name="evaluation" required>
                    <option value="5">5 звезд</option>
                    <option value="4">4 звезды</option>
                    <option value="3">3 звезды</option>
                    <option value="2">2 звезды</option>
                    <option value="1">1 звезда</option>
                </select>
            </div>
            <button class="btn btn-primary mb-3" type="submit">Добавить отзыв</button>
        </form>
        @else
        <p>Чтобы оставить отзыв войдите в систему! <a href="{{route('login')}}"> Войдите в систему</a>.</p>
        @endif
        <form action="/add-to-cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="mb-2 d-flex justify-content-center">
                <input type="number" name="quantity" value="1" min="1" class="text-center">
            </div>
            <button class="btn btn-primary" type="submit">Добавить в корзину</button>
        </form>
    </div>
    @if(count($reviews) > 0)
    <div>
        <h3 class="text-center">Отзывы:</h3>
        <div class="d-flex flex-wrap">
            @foreach($reviews as $review)
                <div class="card m-2" style="width: 300px;">
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $review->UserName }}</strong></h5>
                        <p class="card-text">{{ $review->feedback }}</p>
                        <p class="card-text">Оценка:
                            @for($i = 0; $i < $review->evaluation; $i++)
                                &#9733;
                            @endfor
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-center">На данный товар пока нет отзывов.</p>
@endif

@endsection