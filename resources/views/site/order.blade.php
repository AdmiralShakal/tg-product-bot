<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Заказ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <h1 class="h1">Создание заказа</h1>
    <form action="{{route('order.store')}}" method="post">
        @csrf
        <select class="form-control" name="product_name">
            @foreach ($products as $product )
                <option value="{{$product->name}}">{{$product->name}}</option>
            @endforeach
        </select>

        <div class="form-group">
            <label for="numberCount">Колличество</label>
            <input type="number" class="form-control" name="product_count" id="numberCount" placeholder="1">
        </div>

        <div class="form-group">
            <label for="phone">Мобила</label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="89999999">
        </div>
        <button type="submit" class="btn btn-primary">Заказать</button>
    </form>

    <div>
        <table>
            <thead>
            <tr>
                <th style="padding: 0 20px;">id</th>
                <th style="padding: 0 20px;">Name</th>
                <th style="padding: 0 20px;">Email</th>
                <th style="padding: 0 20px;">Product</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td style="padding: 0 20px;">{{$order->id}}</td>
                    <td style="padding: 0 20px;">{{$order->name}}</td>
                    <td style="padding: 0 20px;">{{$order->email}}</td>
                    <td style="padding: 0 20px;">{{$order->product}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>


</div>

</body>
</html>
