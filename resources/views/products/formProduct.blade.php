

@include('parts.head')

<div style="margin-top: 3rem;display: flex;justify-content: center">
    <div style="max-width: 30vw; min-width: 300px;">
        <div style="margin-bottom: 1rem">
            <h1>Создать товар</h1>
        </div>
        <div style="margin-bottom: 1rem">
            <a target="_blank" href="{{ route('index') }}">Назад</a>
        </div>
        <div style="margin-bottom: 1rem">
            <form action="@if(isset($product)){{ route('products.update', ['product' => $product->id]) }}@else{{ route('products.store') }}@endif" method="POST">
                @csrf
                <div>
                    <label for="title">Введите название продукта: </label>
                    <input type="text" value="{{ $product?->title ?? '' }}" name="title" id="title" required />
                </div>
                <div>
                    <label for="category">Категория: </label>
                    <select name="category" id="category" required>
                        @foreach($categories as $category)
                            <option @if(($product?->category ?? null) == $category) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="price">Введите цену продукта: </label>
                    <input type="number" value="{{ $product?->price ?? '' }}" step="0.01" name="price" id="price" required />
                </div>
                <div>
                    <label for="description">Описание товара: </label>
                    <textarea name="description" id="description">{{ $product?->description ?? '' }}</textarea>
                </div>
                <div>
                    <input type="submit" value="@if(isset($product)) Обновить @else Создать @endif" />
                </div>
            </form>
        </div>
    </div>
</div>

@include('parts.footer')
