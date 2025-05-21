

@include('parts.head')

<div style="margin-top: 3rem;display: flex;justify-content: center">
    <div style="max-width: 30vw; min-width: 300px;">
        <div style="margin-bottom: 1rem">
            <h1>Заказы</h1>
        </div>
        <div style="margin-bottom: 1rem">
            <a target="_blank" href="{{ route('orders.createForm') }}">Создать новый заказ</a>
        </div>
        <div style="margin-bottom: 1rem">
            <table style="border: 1px solid #ccc; width: 100%">
                <tr>
                    <th>Номер заказа</th>
                    <th>Дата</th>
                    <th>ФИО покупателя</th>
                    <th>Статус</th>
                    <th>Цена</th>
                    <th> </th>
                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $orderStatuses[$order->status] }}</td>
                        <td>{{ $order->product->price * $order->product_count }}</td>
                        <td><a href="{{ route('orders.editForm', ['order' => $order->id]) }}">Подробнее</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@include('parts.footer')
