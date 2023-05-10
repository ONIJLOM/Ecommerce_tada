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
                <li class="active">Catálogo</li>
            </ul>
        </div>
    </section>
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
        @foreach ($productos as $producto)
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <!-- Product-->
                <article class="product wow fadeInLeft" data-wow-delay=".15s">
                    <div class="product-figure">
                        <img src="storage/productos/{{ $producto->image }}" alt="..." width="161" height="162">
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
                    <div class="product-price-wrap">
                        <div class="product-price">Bs{{ $producto->precioU }}</div>
                    </div>
                    <div class="product-button">
                        @if (auth()->user())
                            <form action="{{ url('/shoppingCartDetail') }}" method="POST">
                                @csrf
                                <input type="hidden" name="nombreProd" value="{{ $producto->nombre }}">
                                <div class="button-wrap">
                                    <input type="number" class="button button-xs button-primary" value=""
                                        name="cantidad">
                                </div>
                                <input type="hidden" name="precioU" value="{{ $producto->precioU }}">
                                <input type="hidden" name="total" value="0">
                                <input type="hidden" value="{{ $producto->id }}" name="prod_id">
                                @foreach ($carts as $cart)
                                    @if (auth()->user()->id == $cart->client_id)
                                        <input type="hidden" value="{{ $cart->id }}" name="cart_id">
                                    @endif
                                @endforeach
                                <div class="button-wrap">
                                    <button class="button button-xs button-primary button-winona" type="submit">Añadir al
                                        carrito <i class="fa fa-shopping-cart"></i>
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="button-wrap">
                                <a class="button button-xs button-primary button-winona" href="/login">Añadir al
                                    carrito</a>
                            </div>
                        @endif
                        <div class="button-wrap">
                            <a class="button button-xs button-secondary button-winona" href="#">Ver producto</a>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div><br>
    <div class="pagination justify-content-end">
        <h4>{!! $productos->links() !!}</h4>
    </div><br>
@endsection
