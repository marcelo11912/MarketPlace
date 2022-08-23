@component('mail::message')
# Factura Pagada

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($order->items as $item)
        <tr>
            <td scope="row">{{$item->name}}</td>
            <td>{{$item->pivot->quantity}}</td>
            <td>{{$item->pivot->price}}</td>
        </tr>
         @endforeach
    </tbody>
</table>
total : {{$order->total}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
