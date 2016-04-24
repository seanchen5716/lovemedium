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

</head>

<body class="index">
<div class="dropdown" style="padding-top:8px">
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button"  data-toggle="dropdown">Publish
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <form id="publish_form" method="POST" action="{{route('publish')}}">
    <div class="pop-up1">
        Ready to Publish?
    </div>
    <div class="pop-up2">
    Add or change tags (up to 3) so your story reaches more people:
</div>
<div class="text">
    <input type="hidden" name="story_id" value="{{$id}}">
    <input type="text" id="tag" name="tag_name" placeholder="enter a tag name" value="">
</div>
<div class="button">
    <!-- <a href="{{route('publish',$id)}}"><button>Publish</button></a> -->
    <button type="submit" id="publish">Submit</button>
</div>
</form>
  </div>
</div>
</div>


<!-- Editor Content START -->
<div id="new-story" >
</div>
<!-- Editor Content END-->


<script type="text/javascript">
    editor = new Dante.Editor(
            {
                id:"{{$id}}",
                el: "#new-story",
                debug: false,
                upload_url: "{{route('upload-story-image')}}",
                store_url: "{{route('save-story')}}",
                oembed_url: "{{Config::get('app.embedly_app_oembed_url') . '?key=' . Config::get('app.embedly_app_key') . '&url='}}",
                extract_url: "{{Config::get('app.embedly_app_extract_url') . '?key=' . Config::get('app.embedly_app_key') . '&url='}}"
            }
    )
    editor.start()


</script>
<script>
$("#publish").click(function(){
   $.ajax({
    type:"POST",
    url:"{{route('check_story')}}",
    data:{'story_id','{{$id}}'},
    success:function(data)
    {
        if(data==1)
          alert("Enter a story before publishing");
        else
            $("#publish_form").trigger('submit');
    }
   })
});
</script>


<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>