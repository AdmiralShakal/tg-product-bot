Новый заказ <a href="{{env('APP_URL')}}/order?id={{$id}}">№{{$id}}</a>
<i>Товар: </i> {{$product_name}}
<i>Кол-во: </i> {{$product_count}}
<i>Цена за единицу: </i> {{$product_price}}
<i>Итоговая цена: </i> {{$product_price*$product_count}}
<i>Телефон: </i> {{$phone}}
