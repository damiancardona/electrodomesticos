@extends('layouts.menu')

@section('titulo','Quienes somos')

@section('contenidoAppMenu')

<div class="media">
  <div class="media-left">
    <img class="media-object thumbnail" src="{{asset('img/local.jpg')}}" alt="[imagen_local]" />
  </div>
  <div class="media-body">
    <h4 class="media-heading">¿Quienes somos?</h4>
	<p><strong>Electrodomesticos inc.</strong> cuenta con una tienda física en Calle Belgrano 452 (Rosario, Santa Fe, Argentina).
	<p>Nos dedicamos a la venta de todo tipo de Electrodomésticos para su cocina, tv, dvds...y pequeño aparato electrodoméstico de las principales marcas líderes del mercado.</p>
	<p>Somos una empresa que cuenta con 10 años de experiencia en la venta de electrodomésticos, somos profesionales en el asesoramiento y en atención al cliente</p>
	<p>Somos una empresa familiar fundada en el año 2005 en Rosario y especializada en la distribución de electrodomésticos, electrónica de consumo, etc.</p>
	<br>
	<p class="LetraOscura">Horarios de atencion</p>
	<p>Lunes a Viernes de 08:00hs - 19:00hs.</p>
	<p>Sabados y Domingos de 10:00hs a 13:30hs.</p>
	<p>Feriados de 09:00hs a 12:30hs.</p>
	<p>Tel.: (0341) 455-5555/475-9632.</p>
  </div>
</div>
@stop