@extends('layouts.famosaHome')

@section('content')

<section class="bg-gray-7">
    <div class="breadcrumbs-custom box-transform-wrap context-dark">
      <div class="container">
        <h3 class="breadcrumbs-custom-title">Sobre Nosotros</h3>
        <div class="breadcrumbs-custom-decor"></div>
      </div>
      <div class="box-transform" style="background-image: url(images/sobrenosotros1.jpg);"></div>
    </div>
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="index.html">Inicio</a></li>
        <li class="active">Nosotros</li>
      </ul>
    </div>
  </section>
  <section class="section section-lg bg-default">
    <div class="container">
      <div class="tabs-custom row row-50 justify-content-center flex-lg-row-reverse text-center text-md-left" id="tabs-4">
        </div>
        <div class="col-lg-8 col-xl-9">
          <!-- Tab panes-->
          <div class="tab-content tab-content-1">
            <div class="tab-pane fade show active" id="tabs-4-1">
              <h4>Un poco de nuestra historia</h4>
              <p>¡Somos la cadena de retail más grande de Bolivia!

                Nuestra presencia con más de 150 tiendas en toda Bolivia nos permite ser la cadena especializada en cervezas y bebidas alcohólicas más cerca tuyo.

                También contamos con nuestro servicio de delivery a domicilio, en tan sólo unos cuantos pasos puedes comprar tus bebidas favoritas frías, a buen precio y lo mejor: ¡en menos de 35 minutos!</p>
            </p><img src="images/fondocatalog.jpg" alt="" width="835" height="418"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- <!-- Icon Classic-->
  <section class="section section-lg bg-gray-100">
    <div class="container">
      <div class="row row-md row-50">
        <div class="col-sm-6 col-xl-4 wow fadeInUp" data-wow-delay="0s">
          <article class="box-icon-classic">
            <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
              <div class="unit-left">
                <div class="box-icon-classic-icon linearicons-helicopter"></div>
              </div>
              <div class="unit-body">
                <h5 class="box-icon-classic-title"><a href="#">Delivery Eficiente</a></h5>
                <p class="box-icon-classic-text">¡Podremos llevarte hasta la puerta de tu casa cualquiera de nuestros productos!</p>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-xl-4 wow fadeInUp" data-wow-delay=".1s">
          <article class="box-icon-classic">
            <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
              <div class="unit-left">
                <div class="box-icon-classic-icon linearicons-pizza"></div>
              </div>
              <div class="unit-body">
                <h5 class="box-icon-classic-title"><a href="#">Más de 35 modelos de pastas</a></h5>
                <p class="box-icon-classic-text">A lo largo de nuestra historia hemos aprendido a fabricar diversos tipos de productos con una buena calidad.</p>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-xl-4 wow fadeInUp" data-wow-delay=".2s">
          <article class="box-icon-classic">
            <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
              <div class="unit-left">
                <div class="box-icon-classic-icon linearicons-leaf"></div>
              </div>
              <div class="unit-body">
                <h5 class="box-icon-classic-title"><a href="#">Ingredientes de primera calidad</a></h5>
                <p class="box-icon-classic-text">Tratamos de que nuestros productos tengan una excelente calidad al momento de consumirlos.</p>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>


  <section class="section section-lg bg-gray-100 text-left section-relative">
    <div class="container">
      <div class="row row-60 justify-content-center justify-content-xxl-between">
        <div class="col-lg-6 col-xxl-5 position-static">
          <h3>Nuestra Historia</h3>
          <div class="tabs-custom" id="tabs-5">
            <div class="tab-content tab-content-1">
              <div class="tab-pane fade" id="tabs-5-1">
                <h5 class="font-weight-normal text-transform-none text-spacing-75">Creación de Famosa</h5>
                <p>Se instala, promueve y jerarquiza en lo que hoy es un espacio de 5,2 hectáreas del parque industrial, su fábrica de harina y fideos.</p>
              </div>
              <div class="tab-pane fade" id="tabs-5-2">
                <h5 class="font-weight-normal text-transform-none text-spacing-75">Primera gran expansión de la fábrica</h5>
                <p>Empieza la primera de las construcciones de lo que es la fábrica actual.</p>
              </div>
              <div class="tab-pane fade" id="tabs-5-3">
                <h5 class="font-weight-normal text-transform-none text-spacing-75">Famosa se expande a La Paz</h5>
                <p>Mediante la creciente demanda de los productos en el alto, se decide abrir una nueva sucursal en La Paz.</p>
              </div>
              <div class="tab-pane fade show active" id="tabs-5-4">
                <h5 class="font-weight-normal text-transform-none text-spacing-75">Famosa en la Actualidad</h5>
                <p>Hoy en día la empresa cuenta con un buen patrimonio y tiene planeado expandirse hacia otros países</p>
              </div>
            </div>
            <div class="list-history-wrap">
              <ul class="nav list-history">
                <li class="list-history-item" role="presentation"><a href="#tabs-5-1" data-toggle="tab">
                    <div class="list-history-circle"></div>1985</a></li>
                <li class="list-history-item" role="presentation"><a href="#tabs-5-2" data-toggle="tab">
                    <div class="list-history-circle"></div>1997</a></li>
                <li class="list-history-item" role="presentation"><a href="#tabs-5-3" data-toggle="tab">
                    <div class="list-history-circle"></div>2009</a></li>
                <li class="list-history-item" role="presentation"><a class="active" href="#tabs-5-4" data-toggle="tab">
                    <div class="list-history-circle"></div>2022</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-lg-6 position-static index-1">
          <div class="bg-image-right-1 bg-image-right-lg"><img src="images/our_history-1110x710.jpg" alt="" width="1110" height="710"/>
            <div class="link-play-modern"><a class="icon mdi mdi-play" data-lightgallery="item" target="_blank" href="https://www.youtube.com/watch?v=kPLch2GmZwk"></a>
              <div class="link-play-modern-title">Cómo<span>Empezó</span></div>
              <div class="link-play-modern-decor"></div>
            </div>
            <div class="box-transform" style="background-image: url(images/famosahistoria.jpg);"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our clients-->
  <section class="section section-lg bg-default text-md-left">
    <div class="container">
      <div class="row row-60 justify-content-center flex-lg-row-reverse">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="offset-left-xl-70">
            <h3 class="heading-3">Qué dicen las personas</h3>
            <div class="slick-quote">
              <!-- Slick Carousel-->
              <div class="slick-slider carousel-parent" data-autoplay="true" data-swipe="true" data-items="1" data-child="#child-carousel-5" data-for="#child-carousel-5" data-slide-effect="true">
                <div class="item">
                  <!-- Quote Modern-->
                  <article class="quote-modern">
                    <h5 class="quote-modern-text"><span class="q">Torus accelerares, tanquam ferox cacula. Fluctuss experimentum in burdigala! Ubi est peritus classis? Peregrinatione superbe ducunt ad magnum verpa.</span></h5>
                    <h5 class="quote-modern-author">Stephen Adams,</h5>
                    <p class="quote-modern-status">Regular Client</p>
                  </article>
                </div>
                <div class="item">
                  <!-- Quote Modern-->
                  <article class="quote-modern">
                    <h5 class="quote-modern-text"><span class="q">Gluten, fluctus, et galatae. Germanus classiss ducunt ad brodium. Pol, a bene cedrium. Tabess unda in neuter avenio! Orexiss sunt adelphiss de rusticus parma.</span></h5>
                    <h5 class="quote-modern-author">Sam Peterson,</h5>
                    <p class="quote-modern-status">Regular Client</p>
                  </article>
                </div>
                <div class="item">
                  <!-- Quote Modern-->
                  <article class="quote-modern">
                    <h5 class="quote-modern-text"><span class="q">Pol, silva! Grandis contencios ducunt ad torus. Monss congregabo in nobilis tectum! Velox, fatalis victrixs sapienter talem de emeritis, festus torus.</span></h5>
                    <h5 class="quote-modern-author">Jane McMillan,</h5>
                    <p class="quote-modern-status">Regular Client</p>
                  </article>
                </div>
                <div class="item">
                  <!-- Quote Modern-->
                  <article class="quote-modern">
                    <h5 class="quote-modern-text"><span class="q">Fluctuss sunt eras de neuter plasmator. Heuretes noster brabeuta est. Nixus, visus, et mensa. Primus, magnum tatas rare locus de altus, camerarius clabulare.</span></h5>
                    <h5 class="quote-modern-author">Will Jones,</h5>
                    <p class="quote-modern-status">Regular Client</p>
                  </article>
                </div>
              </div>
              <div class="slick-slider child-carousel" id="child-carousel-5" data-arrows="true" data-for=".carousel-parent" data-items="4" data-sm-items="4" data-md-items="4" data-lg-items="4" data-xl-items="4" data-slide-to-scroll="1">
                <div class="item"><img class="img-circle" src="images/team-5-83x83.jpg" alt="" width="83" height="83"/>
                </div>
                <div class="item"><img class="img-circle" src="images/team-6-83x83.jpg" alt="" width="83" height="83"/>
                </div>
                <div class="item"><img class="img-circle" src="images/team-7-83x83.jpg" alt="" width="83" height="83"/>
                </div>
                <div class="item"><img class="img-circle" src="images/team-8-83x83.jpg" alt="" width="83" height="83"/>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xl-7"><img src="images/loqueopinan.png" alt="" width="669" height="447"/>
        </div>
      </div>
    </div>  --}}
  </section>


@endsection
