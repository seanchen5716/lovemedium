@extends('layout')
@section('title', 'Dashboard')
@section('content')
<div class="main container" >
@include('partials.menu')
<section class="content clearfix" >
<div class="newsfeed" >
<div class="feed clearfix" >
<div class="avatar" >

<div class="selection" ></div >
</div >
<div class="news" >
<div class="create" >
<ul id="trigger" class="post-triggers" >
	<li> <a href="{{URL::route('blog_editor')}}" id="text-trigger" >
     
      <span > Write Story </span > </li>
	<li> <a href="{{URL::route('drafts')}}" id="text" >
    
      <span > Drafts </span > </li>
</ul>
</div>
</div>
</div>
</div>

@stop