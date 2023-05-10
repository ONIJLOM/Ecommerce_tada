@extends('layouts.famosaHome')

@section('content')

<section class="bg-gray-7">
    <div class="breadcrumbs-custom box-transform-wrap context-dark">
      <div class="container">
        <h3 class="breadcrumbs-custom-title">Contacts</h3>
        <div class="breadcrumbs-custom-decor"></div>
      </div>
      <div class="box-transform" style="background-image: url(images/f3.png);"></div>
    </div>
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="index.html">Inicio</a></li>
        <li class="active">Contactos</li>
      </ul>
    </div>
  </section>
  <!-- Contacts-->
  <section class="section section-lg bg-default text-md-left">
    <div class="container">
      <div class="row row-60 justify-content-center">
        <div class="col-lg-8">
          <h4 class="text-spacing-25 text-transform-none">Get in Touch</h4>
          <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
            <div class="row row-20 gutters-20">
              <div class="col-md-6">
                <div class="form-wrap">
                  <input class="form-input" id="contact-your-name-5" type="text" name="name" data-constraints="@Required">
                  <label class="form-label" for="contact-your-name-5">Tu nombre*</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrap">
                  <input class="form-input" id="contact-email-5" type="email" name="email" data-constraints="@Email @Required">
                  <label class="form-label" for="contact-email-5">Tu correo*</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrap">
                  <!--Select 2-->
                  <select class="form-input" data-minimum-results-for-search="Infinity" data-constraints="@Required">
                    <option value="1">Seleccionar servicio</option>
                    <option value="2">Dine-In</option>
                    <option value="3">Carry-Out</option>
                    <option value="4">Event Catering</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrap">
                  <input class="form-input" id="contact-phone-5" type="text" name="phone" data-constraints="@Numeric">
                  <label class="form-label" for="contact-phone-5">Tu telefono*</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-wrap">
                  <label class="form-label" for="contact-message-5">Mensaje</label>
                  <textarea class="form-input textarea-lg" id="contact-message-5" name="message" data-constraints="@Required"></textarea>
                </div>
              </div>
            </div>
            <button class="button button-secondary button-winona" type="submit">Contact us</button>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="aside-contacts">
            <div class="row row-30">
              <div class="col-sm-6 col-lg-12 aside-contacts-item">
                <p class="aside-contacts-title">Redes sociales</p>
                <ul class="list-inline contacts-social-list list-inline-sm">
                  <li><a class="icon mdi mdi-facebook" target="_blank" href="https://www.facebook.com/FamosaBolivia%22%3E"></a></li>
                  <li><a class="icon mdi mdi-twitter" target="_blank" href="https://twitter.com/famosa_bolivia?lang=es%22%3E"></a></li>
                  <li><a class="icon mdi mdi-instagram" target="_blank" href="https://www.instagram.com/famosabolivia/?hl=es%22%3E"></a></li>
                </ul>
              </div>
              <div class="col-sm-6 col-lg-12 aside-contacts-item">
                <p class="aside-contacts-title">Telefono</p>
                <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                  <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                  <div class="unit-body"><a class="phone" href="tel:#">3 3462670</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-12 aside-contacts-item">
                <p class="aside-contacts-title">Correo</p>
                <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                  <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                  <div class="unit-body"><a class="mail" href="mailto:#">info@famosa.com.bo</a></div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-12 aside-contacts-item">
                <p class="aside-contacts-title">Ubicacion</p>
                <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                  <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                  <div class="unit-body"><a class="address" href="#">PI MZ13 Y 14 barrio industrial Santa Cruz de la Sierra, Bolivia<br class="d-md-none">Alexandria, VA, 2230</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
