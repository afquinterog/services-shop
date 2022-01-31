@component('mail::message')
    # {{ $company->name }}

    Hola {{ $company->name }},

    Se ha creado un nuevo pedido en tu tienda virtual.

    **Cliente**: {{ $order->name }}
    **Teléfono**: {{ $order->phone }}
    **Cantidad**: {{ $order->quantity }}
    **Producto**: {{ $product->name }}

    Gracias,
    {{ $company->name }}
@endcomponent
