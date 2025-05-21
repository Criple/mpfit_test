

@include('parts.head')

<div style="margin-top: 3rem;display: flex;justify-content: center">
    <div style="max-width: 30vw; min-width: 300px;">
        <div style="margin-bottom: 1rem">
            <h1>Товары</h1>
        </div>
        <div style="margin-bottom: 1rem">
            <a target="_blank" href="{{ route('products.createForm') }}">Создать новый товар</a>
        </div>
        <div style="margin-bottom: 2rem">
            <table style="border: 1px solid #ccc; width: 100%">
                <tr>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Категория</th>
                    <th> </th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td><a href="{{ route('products.editForm', ['product' => $product->id]) }}">Редактировать</a> / <a href="{{ route('products.destroy', ['id' => $product->id]) }}">Удалить</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div>
            <a href="{{ route('orders.index') }}">Перейти к заказам</a>
        </div>
    </div>
</div>

@include('parts.footer')
