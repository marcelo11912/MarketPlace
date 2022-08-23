@component('mail::message')
<p>Hola: <strong>{{$user->customer->display_name}}</strong></p><br>
<p>Hemos creado una cuenta para que pueda revisar sus pedidos</p><br>
<p>Su correo es: <strong>{{$user->email}}</strong></p><br>
<p>Su contrasena es: <strong>{{$password}}</strong></p><br>
<p>Para ingresar a su cuenta, haga click en el siguiente boton:</p><br>


@component('mail::button', ['url' => route('my.account')])
Ir a mi cuenta
@endcomponent
<p>Puede cambiar la contrasena cuando quiera.</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
