<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <title>Dante Editor example</title>
    <link href="{{URL::to('editor/css/normalize.css')}}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{URL::to('editor/css/all.css')}}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{URL::to('editor/css/dante-editor.css')}}" media="screen" rel="stylesheet" type="text/css">
    <script src="{{URL::to('editor/js/deps.js')}}" type="text/javascript"></script><style type="text/css"></style>
    <script src="{{URL::to('editor/js/dante-editor.js')}}" type="text/javascript"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <!--<link href="css/animate.css" rel="stylesheet">-->
    <!-- Custom CSS -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Custom CSS --> 
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="index">
<div class="dropdown" style="padding-top:8px">
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Publish
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <form method="POST" action="{{route('publish')}}">
    <div class="pop-up1">
        Ready to Publish?
    </div>
    <div class="pop-up2">
    Add or change tags (up to 3) so your story reaches more people:
</div>
<div class="text">
    <input type="hidden" name="story_id" value="{{$id}}">
    <input type="text" name="tag_name" placeholder="enter a tag name" value="">
</div>
<div class="button">
    <!-- <a href="{{route('publish',$id)}}"><button>Publish</button></a> -->
    <input type="submit">
</div>
</form>
  </div>
</div>
</div>

<!-- Editor Content START -->
<div id="edit-story" >
    {{$story->content}}
</div>
<!-- Editor Content END-->

<script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    editor = new Dante.Editor(
            {
                id:"{{$story->id}}",
                el: "#edit-story",
                debug: false,
                upload_url: "{{route('upload-story-image')}}",
                store_url: "{{route('save-story')}}",
                oembed_url: "{{Config::get('app.embedly_app_oembed_url') . '?key=' . Config::get('app.embedly_app_key') . '&url='}}",
                extract_url: "{{Config::get('app.embedly_app_extract_url') . '?key=' . Config::get('app.embedly_app_key') . '&url='}}"
            }
    )
    editor.start()
</script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>