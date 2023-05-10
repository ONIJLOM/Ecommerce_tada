@extends('layouts.famosaHome')
@section('content')
    <section class="bg-gray-7">
        <div class="breadcrumbs-custom box-transform-wrap context-dark">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">Catálogo</h3>
                <div class="breadcrumbs-custom-decor"></div>
            </div>
            <div class="box-transform" style="background-image: url(images/fondocatalog.jpg)"></div>
        </div>
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Inicio</a></li>
                <li class="active">Carrito</li>
            </ul>
        </div>
    </section>
    <?php $total = 0; ?>
    @if (Session::has('mensaje'))
        <div class="alert alert-success alert dismissible" role="alert">
            <h3 style="background-color: #d1e7dd">{{ Session::get('mensaje') }}</h3>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background-color: #d1e7dd"
                style="border: #66ffba">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row row-lg row-30">
        @foreach ($carts as $cart)
            @if ($cart->client_id == auth()->user()->id)
                <?php $idCart = $cart->id; ?>
            @endif
        @endforeach
        @foreach ($cartDetails as $cartDetail)
            @if ($cartDetail->cart_id == $idCart)
                @foreach ($productos as $producto)
                    @if ($cartDetail->prod_id == $producto->id)
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <!-- Product-->
                            <article class="product wow fadeInLeft" data-wow-delay=".15s">
                                <div class="product-figure">
                                    <img src="storage/productos/{{ $producto->image }}" alt="..." width="161"
                                        height="162">
                                </div>
                                <div class="product-rating">
                                    <span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                                        class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                                        class="mdi mdi-star text-gray-13"></span>
                                </div>
                                <h6 class="product-title">{{ $producto->nombre }} -
                                    @foreach ($pesos as $peso)
                                        @if ($peso->id == $producto->id_Peso)
                                            {{ $peso->gramos }} Gr
                                        @endif
                                    @endforeach
                                </h6>
                                <div class="product-wrap">
                                    <div class="product-price">Cantidad: {{ $cartDetail->cantidad }}</div>
                                </div>
                                <div class="product-price-wrap">
                                    <div class="product-price">Bs{{ $producto->precioU }}</div>
                                </div>
                                <div class="product-button">
                                    <div class="button-wrap">
                                        <a class="button button-xs button-secondary button-winona" href="#">Ver
                                            producto</a>
                                    </div>
                                    <form action="{{ url('/shoppingCartDetail/' . $cartDetail->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <div class="button-wrap">
                                            <input class="button button-xs button-primary button-winona" type="submit"
                                                onclick="return confirm('¿Seguro que quieres borrar?')" value="Delete">
                                        </div>
                                    </form>
                                </div>
                            </article>
                        </div>
                    @endif
                @endforeach
                <?php $total += $cartDetail->total; ?>
            @endif
        @endforeach
    </div><br>
    <h3>Total: {{ $total }} Bs</h3><br>
@endsection
