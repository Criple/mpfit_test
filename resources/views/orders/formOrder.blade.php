

@include('parts.head')

<div style="margin-top: 3rem;display: flex;justify-content: center">
    <div style="max-width: 30vw; min-width: 300px;">
        <div style="margin-bottom: 1rem">
            <h1>Создать заказ</h1>
        </div>
        <div style="margin-bottom: 1rem">
            <a target="_blank" href="{{ route('orders.index') }}">Назад</a>
        </div>
        <div style="margin-bottom: 1rem">
            @if(isset($order))
                <p><b>Номер заказа:</b> {{ $order->id }}</p>
                <p><b>ФИО покупателя:</b> {{ $order->customer_name }}</p>
                <p><b>Товар:</b> {{ $order->product->title }}</p>
                <p><b>Кол-во товара:</b> {{ $order->product_count }}</p>
                <p><b>Цена за ед.:</b> {{ $order->product->price }}</p>
                <p><b>Общая цена:</b> {{ $order->product->price * $order->product_count }}</p>
                <p><b>Комментарии:</b> {{ $order->comment }}</p>
                <p><b>Статус заказа:</b> {{ $orderStatuses[$order->status] }}</p>
                @if($order->status == 'new')
                    <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="completed" />
                        <input type="submit" value="Завершить" />
                    </form>
                @endif
            @else
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="customer_name">Введите ФИО покупателя: </label>
                        <input type="text" name="customer_name" id="customer_name" required />
                    </div>
                    <div>
                        <label for="product_id">Товар: </label>
                        <select name="product_id" id="product_id" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="product_count">Кол-во товара: </label>
                        <input type="number" value="1" name="product_count" id="product_count" required />
                    </div>
                    <div>
                        <label for="comment">Комментарии: </label>
                        <textarea name="comment" id="comment"></textarea>
                    </div>
                    <div>
                        <input type="submit" value="Создать" />
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>

@include('parts.footer')
