<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" > <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" > <!--<![endif]-->
<head >
  <meta charset="utf-8" >
  <meta http-equiv="X-UA-Compatible" content="IE=edge" >
  <title >@yield('title')</title >
  <meta name="description" content="A kickass tumblr clone" >
  <meta name="viewport" content="width=device-width, initial-scale=1" >

  <link rel="stylesheet" href="{{asset('assets/minified/application.min.css')}}" >
  <script src="{{asset('assets/minified/modernizr.min.js')}}" ></script >
  <?php echo html_entity_decode(Setting::where('option', '=', 'header_code')->first()->value); ?>
</head >
<body >