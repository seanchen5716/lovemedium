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
    @foreach($stories as $s)
    <a href="{{route('edit-story',array($s->id))}}">edit </a>

    @endforeach
</ul>
@stop