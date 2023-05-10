@extends('layouts.famosaHome')

@section('content')
    <section class="section swiper-container swiper-slider swiper-slider-2 swiper-slider-3" data-loop="true"
        data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper text-sm-left">
            <div class="swiper-slide context-dark" data-slide-bg="images/open-graph2tada.png">
                <div class="swiper-slide-caption section-md">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9 col-md-8 col-lg-7 col-xl-7 offset-lg-1 offset-xxl-0">
                                <h1 class="oh swiper-title">
                                    <span class="d-inline-block" data-caption-animate="slideInUp"
                                        data-caption-delay="0">LA MEJOR COMODIDAD</span>
                                </h1>
                                <p class="big swiper-text" data-caption-animate="fadeInLeft" data-caption-delay="300">
                                    Pruebe nuestro mejor servicio de la ciudad hasta incluso del
                                    país!!
                                </p>
                                <a class="button button-lg button-primary button-winona button-shadow-2" href="{{ route('catalogo') }}"
                                    data-caption-animate="fadeInUp" data-caption-delay="300">Ver productos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide context-dark" data-slide-bg="images/portada2.jpg">
                <div class="swiper-slide-caption section-md">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-lg-7 offset-lg-1 offset-xxl-0">
                                <h1 class="oh swiper-title">
                                    <span class="d-inline-block" data-caption-animate="slideInDown"
                                        data-caption-delay="0">Productos de Calidad</span>
                                </h1>
                                <p class="big swiper-text" data-caption-animate="fadeInRight" data-caption-delay="300">
                                    Nos aseguramos que el proceso de nuestros productos sea único
                                    para una mejor experiencia
                                </p>
                                <div class="button-wrap oh">
                                    <a class="button button-lg button-primary button-winona button-shadow-2" href="{{ route('catalogo') }}"
                                        data-caption-animate="slideInUp" data-caption-delay="0">Ver productos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination" data-bullet-custom="true"></div>
        <!-- Swiper Navigation-->
        <div class="swiper-button-prev">
            <div class="preview">
                <div class="preview__img"></div>
            </div>
            <div class="swiper-button-arrow"></div>
        </div>
        <div class="swiper-button-next">
            <div class="swiper-button-arrow"></div>
            <div class="preview">
                <div class="preview__img"></div>
            </div>
        </div>
    </section>
    <!-- What We Offer-->
     <section class="section section-md bg-default">
        <div class="container">
            <h3 class="oh-desktop">
                <span class="d-inline-block wow slideInDown">productos</span>
            </h3>
            <div class="row row-md row-30">
                <div class="col-sm-6 col-lg-4">
                    <div class="oh-desktop">
                        <!-- Services Terri-->
                        <article class="services-terri wow slideInUp">
                            <div class="services-terri-figure">
                                <img src="images/paceña.jpg" alt="" width="370" height="278" />
                            </div>
                            <div class="services-terri-caption">
                                <!-- <span class="services-terri-icon linearicons-leaf"></span> -->
                                <h5 class="services-terri-title"><a href="#">Paceña</a></h5>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="oh-desktop">
                        <!-- Services Terri-->
                        <article class="services-terri wow slideInUp">
                            <div class="services-terri-figure">
                                <img src="images/pepsi.jpg" alt="" width="370" height="278" />
                            </div>
                            <div class="services-terri-caption">
                                <!-- <span class="services-terri-icon linearicons-leaf"></span> -->
                                <h5 class="services-terri-title"><a href="#">Pepsi</a></h5>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="oh-desktop">
                        <!-- Services Terri-->
                        <article class="services-terri wow slideInDown">
                            <div class="services-terri-figure">
                                <img src="images/corona.jpg" alt="" width="370"
                                    height="278" />
                            </div>
                            <div class="services-terri-caption">
                                <!-- <span class="services-terri-icon linearicons-pizza"></span> -->
                                <h5 class="services-terri-title"><a href="#">Corona</a></h5>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="oh-desktop">
                        <article class="services-terri wow slideInDown">
                            <div class="services-terri-figure">
                                <img src="images/huari.jpg" alt="" width="370"
                                    height="278" />
                            </div>
                            <div class="services-terri-caption">
                                <!--   <span class="services-terri-icon linearicons-pizza"></span> -->
                                <h5 class="services-terri-title"><a href="#">Huari</a></h5>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="oh-desktop">
                        <!-- Services Terri-->
                        <article class="services-terri wow slideInUp">
                            <div class="services-terri-figure">
                                <img src="images/monster.jpg" alt="" width="370" height="278" />
                            </div>
                            <div class="services-terri-caption">
                                <!--  <span class="services-terri-icon linearicons-hamburger"></span> -->
                                <h5 class="services-terri-title">
                                    <a href="#">Monster</a>
                                </h5>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="oh-desktop">
                        <!-- Services Terri-->
                        <article class="services-terri wow slideInUp">
                            <div class="services-terri-figure">
                                <img src="images/redbull.jpg" alt=""
                                    width="370" height="278" />
                            </div>
                            <div class="services-terri-caption">
                                <!-- <span class="services-terri-icon linearicons-hamburger"></span> -->
                                <h5 class="services-terri-title">
                                    <a href="#">Redbull</a>
                                </h5>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="oh-desktop">
                        <!-- Services Terri-->
                        {{-- <article class="services-terri wow slideInDown">
                            <div class="services-terri-figure">
                                <img src="images/Pasta Chips.jpg" alt="" width="370" height="278" />
                            </div>
                            <div class="services-terri-caption">
                                <!-- <span class="services-terri-icon linearicons-ice-cream"></span> -->
                                <h5 class="services-terri-title">
                                    <a href="#">Pasta Chips</a>
                                </h5>
                            </div>
                        </article> --}}
                    </div>
                </div>
                {{-- <div class="col-sm-6 col-lg-4">
                    <div class="oh-desktop">
                        <!-- Services Terri-->
                        <article class="services-terri wow slideInUp">
                            <div class="services-terri-figure">
                                <img src="images/Pasta Pizza.jpg" alt="" width="370" height="278" />
                            </div>
                            <div class="services-terri-caption">
                                <!-- <span class="services-terri-icon linearicons-coffee-cup"></span> -->
                                <h5 class="services-terri-title"><a href="#">Pasta Pizza</a></h5>
                            </div>
                        </article>
                    </div>
                </div> --}}
                {{-- <div class="col-sm-6 col-lg-4">
                    <div class="oh-desktop">
                        <!-- Services Terri-->
                        <article class="services-terri wow slideInDown">
                            <div class="services-terri-figure">
                                <img src="images/Pastel de Macarrones.jpg" alt="" width="370"
                                    height="278" />
                            </div>
                            <div class="services-terri-caption">
                                <!-- <span class="services-terri-icon linearicons-steak"></span> -->
                                <h5 class="services-terri-title">
                                    <a href="#">Pastel de Macarrones</a>
                                </h5>
                            </div>
                        </article>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Section CTA-->
    <section class="primary-overlay section parallax-container" data-parallax-img="images/ppp.jpg">
        <div class="parallax-content section-xl context-dark text-md-left">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-sm-8 col-md-7 col-lg-5">
                        <div class="cta-modern">
                            <h3 class="cta-modern-title wow fadeInRight">
                                Los mejores servicios
                            </h3>
                            <p class="lead">
                                TADA, la verdadera tienda online Boliviana de bebidas.
                            </p>
                            <p class="cta-modern-text oh-desktop" data-wow-delay=".1s">
                                {{-- <span class="cta-modern-decor wow slideInLeft"></span><span
                                    class="d-inline-block wow slideInDown"></span> --}}
                            </p>
                            <a class="button button-md button-secondary-2 button-winona wow fadeInUp" href="#"
                                data-wow-delay=".2s">Vea nuestros servicios</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Shop-->
    <section class="section section-lg bg-default">
        <div class="container">
            <h3 class="oh-desktop">
                <span class="d-inline-block wow slideInUp">Productos más Vendidos</span>
            </h3>
            <div class="row row-lg row-30">
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <!-- Product-->
                    <article class="product wow fadeInLeft" data-wow-delay=".15s">
                        <div class="product-figure">
                            <img src="images/cocacola3l.jpg" alt="" width="181" height="193" />
                        </div>
                        <div class="product-rating">
                            <span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                                class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                                class="mdi mdi-star text-gray-13"></span>
                        </div>
                        <h6 class="product-title">Coca Cola 3 Lts</h6>
                        <div class="product-price-wrap">
                            <div class="product-price">Bs15.00</div>
                        </div>
                        <div class="product-button">
                            <div class="button-wrap">
                                <a class="button button-xs button-primary button-winona" href="#">Añadir al
                                    carrito</a>
                            </div>
                            <div class="button-wrap">
                                <a class="button button-xs button-secondary button-winona" href="#">Ver producto</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <!-- Product-->
                    <article class="product wow fadeInLeft" data-wow-delay=".1s">
                        <div class="product-figure">
                            <img src="images/paceña300ml.png" alt="" width="161" height="162" />
                        </div>
                        <div class="product-rating">
                            <span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                                class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                                class="mdi mdi-star"></span>
                        </div>
                        <h6 class="product-title">cerveza Paceña 300ml</h6>
                        <div class="product-price-wrap">
                            <div class="product-price">Bs6.00</div>
                        </div>
                        <div class="product-button">
                            <div class="button-wrap">
                                <a class="button button-xs button-primary button-winona" href="#">Añadir al
                                    carrito</a>
                            </div>
                            <div class="button-wrap">
                                <a class="button button-xs button-secondary button-winona" href="#">Ver producto</a>
                            </div>
                        </div>
                        <!-- <span class="product-badge product-badge-new">New</span> -->
                    </article>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <!-- Product-->
                    <article class="product wow fadeInLeft" data-wow-delay=".05s">
                        <div class="product-figure">
                            <img src="storage/productos/redbull300ml.png" alt="" width="161" height="162" />
                        </div>
                        <div class="product-rating">
                            <span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                                class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                                class="mdi mdi-star text-gray-13"></span>
                        </div>
                        <h6 class="product-title">Red Bull 300ml</h6>
                        <div class="product-price-wrap">
                            <div class="product-price">Bs15.00</div>
                        </div>
                        <div class="product-button">
                            <div class="button-wrap">
                                <a class="button button-xs button-primary button-winona" href="#">Añadir al
                                    carrito</a>
                            </div>
                            <div class="button-wrap">
                                <a class="button button-xs button-secondary button-winona" href="#">Ver producto</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <!-- Product-->
                    <article class="product wow fadeInLeft">
                        <div class="product-figure">
                            <img src="storage/productos/ron2ml.png" alt="" width="161" height="162" />
                        </div>
                        <div class="product-rating">
                            <span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                                class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                                class="mdi mdi-star"></span>
                        </div>
                        <h6 class="product-title">Ron FLor de Caña 5 Años 2 Lts </h6>
                        <div class="product-price-wrap">
                            <div class="product-price product-price-old">Bs150.00</div>
                            <div class="product-price">Bs120.00</div>
                        </div>
                        <div class="product-button">
                            <div class="button-wrap">
                                <a class="button button-xs button-primary button-winona" href="#">Añadir al
                                    carrito</a>
                            </div>
                            <div class="button-wrap">
                                <a class="button button-xs button-secondary button-winona" href="#">Ver producto</a>
                            </div>
                        </div>
                        <!-- <span class="product-badge product-badge-sale">Sale</span> -->
                    </article>
                </div>
            </div>
            {{-- <a href="#">Ver Todos</a> --}}
        </div>
    </section>

    <!-- Section CTA-->

    <!-- What We Offer-->
    <section class="section section-xl bg-default">
        <div class="container">
            <h3 class="wow fadeInLeft">Clientes Satisfechos</h3>
        </div>
        <div class="container container-style-1">
            <div class="owl-carousel owl-style-12" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30"
                data-xl-margin="45" data-autoplay="true" data-nav="true" data-center="true" data-smart-speed="400">
                <article class="quote-tara">
                    <div class="quote-tara-caption">
                        <div class="quote-tara-text">
                            <p class="q">

                            </p>
                        </div>
                        <div class="quote-tara-figure">
                            <img src="images/user-6-115x115.jpg" alt="" width="115" height="115" />
                        </div>
                    </div>
                    <h6 class="quote-tara-author">Ashley Fitzgerald</h6>
                    <div class="quote-tara-status">Client</div>
                </article>

                <article class="quote-tara">
                    <div class="quote-tara-caption">
                        <div class="quote-tara-text">
                            <p class="q">

                            </p>
                        </div>
                        <div class="quote-tara-figure">
                            <img src="images/user-8-115x115.jpg" alt="" width="115" height="115" />
                        </div>
                    </div>
                    <h6 class="quote-tara-author">Stephanie Williams</h6>
                    <div class="quote-tara-status">Client</div>
                </article>

                <article class="quote-tara">
                    <div class="quote-tara-caption">
                        <div class="quote-tara-text">
                            <p class="q">

                            </p>
                        </div>
                        <div class="quote-tara-figure">
                            <img src="images/user-7-115x115.jpg" alt="" width="115" height="115" />
                        </div>
                    </div>
                    <h6 class="quote-tara-author">Bill Johnson</h6>
                    <div class="quote-tara-status">Client</div>
                </article>

                <article class="quote-tara">
                    <div class="quote-tara-caption">
                        <div class="quote-tara-text">
                            <p class="q">

                            </p>
                        </div>
                        <div class="quote-tara-figure">
                            <img src="images/user-9-115x115.jpg" alt="" width="115" height="115" />
                        </div>
                    </div>
                    <h6 class="quote-tara-author">Aaron Wilson</h6>
                    <div class="quote-tara-status">Client</div>
                </article>
            </div>
        </div>
    </section>
@endsection
