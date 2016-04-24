<?php

  class StoryController extends BaseController {

  	public function blog_editor()
    {
      $user_id=Sentry::getUser()->id;
      $user=User::find($user_id);
      $story=new Story;
      $story->save();
      return View::make("write_story")->with("id",$story->id)->with("user",$user);     
    }
    
    public function home()
    {
      $bookmark=array();  
      $top_stories=Story::where('type',1)->orderBy('rec_count', 'DESC')->get();
      $stories=Story::where('type',1)->orderBy('updated_at','DESC')->get();
      $tags=Tag::paginate(15);
      if(Sentry::check())
      {
      $bookmark=Bookmark::where('user_id',Sentry::getUser()->id)->get();
      }
      return View::make("homepage")->with('top_stories',$top_stories)->with('tags',$tags)->with('stories',$stories)->with('bm',$bookmark);
    }

    public function search()
    {
      $query=Input::get('search');
      $all_stories=array();
      $arr=array();       
      $users=User::where('username','like',"%".$query."%")->get();
      $tags=Tag::where('name','like',"%".$query."%")->get();
      $stories=Story::get();
      foreach($stories as $story)
      {
        $content=$story->content;
        if($content != NULL)
        {
          $content = new Htmldom($content);
          if(mb_stripos($content,$query)!=false)
          {
            $arr[]=$story->id;
          }
        }
      }
      if(count($arr)>0)
      {
      $arrstring = implode(",", $arr);
      $query1="select * from story where id in (".$arrstring.") and type=1";
      $all_stories = DB::select(DB::raw($query1));
      }
      return View::make('search_new')->with('all_stories',$all_stories)->with('tags',$tags)->with('users',$users);

    }

    public function bookmark()
    {
      $id=Input::get('story_id');
      $user_id=Sentry::getUser()->id;
      $bookmark=Bookmark::where('story_id',$id)->where('user_id',$user_id)->first();
      if(!$bookmark)
      {
      $bookmark=new Bookmark;
      $bookmark->story_id=$id;
      $bookmark->user_id=Sentry::getUser()->id;
      $bookmark->save();
      } 

    }

    public function unbookmark()
    {
      $id =Input::get('story_id');
      $bookmark=Bookmark::where('story_id',$id)->where('user_id',Sentry::getUser()->id)->first();
      if($bookmark)
      $bookmark->delete(); 

    }

    public function settings()
    {
      $user=User::find(Sentry::getUser()->id);
      return View::make('settings_medium')->with('user',$user);

    }

    public function tags($id)
    {
      $sel_tag=Tag::find($id);
      $name=$sel_tag->name;
      $follow_flag=1;
      if (Sentry::check())
      {
        $user_id=Sentry::getUser()->id;
        $follow=Follow::where('type',1)->where('type_id',$id)->where('user_id',$user_id)->first();
        if($follow != NULL)
        $follow_flag=0;
      }
      $stories=Story::where('tag_id',$id)->get();
      $tags=Tag::paginate(15);
      return View::make('tags')->with('name',$name)->with('stories',$stories)->with('tag_id',$id)->with('follow_flag',$follow_flag)->with('tags',$tags);

    }

    public function comment()
    {
      $story_id=Input::get('story_id');
      Log::info($story_id);
      $comments=Comment::where('story_id',$story_id)->get();
      Log::info("************");
      Log::info($comments);
      Log::info("************");
      return $comments;

    }

    public function update_comment()
    {
      $story_id=Input::get('story_id');
      $comment=Input::get('comment');
      $user_id=Sentry::getUser()->id;
      Log::info($story_id);
      $comments= new Comment;
      $comments->user_id=$user_id;
      $comments->story_id=$story_id;
      $comments->content=$comment;
      $comments->save();
      $comments=Comment::where('story_id',$story_id)->get();
      Log::info("************");
      Log::info($comments);
      Log::info("************");
      return count($comments);

    }

    public function story()
    {
    	$stories=Story::get();
    	return View::make("story");
    }

    public function check_story()
    {
      $id=$_POST['story_id'];
      $stories=Story::find($id);
      $str=$stories->content;
      $doc = new Htmldom($str);
      $img=$doc->find("p",0);
      Log::info("img->outertext");
      Log::info($img->outertext);
      if($img->plaintext=='Tell your story…')
        $flag==1;
      else
        $flag==0;
      return $flag;
    }

    public function displayStory($id)
    { 
    $flag=0;
    $bkmrk_flag=0;
    $story=Story::find($id);
    if (Sentry::check())
    {
      $user_id=Sentry::getUser()->id;
      $rec=Recommendation::where('user_id',$user_id)->where('story_id',$id)->first();
      $bookmark=Bookmark::where('story_id',$story->id)->where('user_id',Sentry::getUser()->id)->first();
      if($rec != NULL)
      $flag=1;
      if($bookmark != NULL)
      $bkmrk_flag=1;
    }
    $rec_ct=Recommendation::where('story_id',$id)->get();
    $rec_count=count($rec_ct);
    $comments=Comment::where('story_id',$id)->get();
    return View::make("display_story")
                  ->with("story",$story)
                  ->with('flag',$flag)
                  ->with('comments',$comments)
                  ->with('rec_count',$rec_count)
                  ->with('bkmrk_flag',$bkmrk_flag); 
    }

    public function recommend()
    {
      $story_id=Input::get('story_id');
      $user_id=Sentry::getUser()->id;
      $story=Story::find($story_id);
      $story->rec_count+=1;
      $story->save();
      $rec=Recommendation::where('story_id',$story_id)->where('user_id',$user_id)->first();
      if(!$rec)
      { 
      $rec=new Recommendation;
      $rec->user_id=$user_id;
      $rec->story_id=$story_id;
      $rec->save();
      $rec_ct=Recommendation::where('story_id',$story_id)->get();
      $rec_count=count($rec_ct);
      }
      return ($rec_count);

    }

    public function follow()
    {
      $type=Input::get('type');
      $tag_id=Input::get('tag_id');
      $user_id=Sentry::getUser()->id;
      $follow=Follow::where('user_id',$user_id)->where('type_id',$tag_id)->where('type',$type)->first();
      if(!$follow)
      {
        $follow=new Follow;
        $follow->user_id=$user_id;
        $follow->type_id=$tag_id;
        $follow->type=$type;
        $follow->save();
      }
      return ("success");

    }

    public function unfollow()
    {
      $type=Input::get('type');
      $tag_id=Input::get('tag_id');
      $user_id=Sentry::getUser()->id;
      $follow=Follow::where('type',$type)->where('type_id',$tag_id)->where('user_id',$user_id)->first();
      if($follow)
      $follow->delete();
      return ("success");

    }

    public function undo_recommend()
    {
      $story_id=$_POST['story_id'];
      $user_id=Sentry::getUser()->id;
      $story=Story::find($story_id);
      $story->rec_count-=1;
      $story->save();
      $rec=Recommendation::where('user_id',$user_id)->where('story_id',$story_id)->first();
      if($rec)
      $rec->delete();
      $rec_ct=Recommendation::where('story_id',$story_id)->get();
      $rec_count=count($rec_ct);
      return ($rec_count);
    }

    public function drafts()
    {
      $user_id=Sentry::getUser()->id;
    	$stories=Story::where('user_id',$user_id)->get();
    	return View::make("draft_page")->with('stories',$stories);
    }

    public function admin_delete($id)
    {
       $story=Story::find($id);
       $bookmark=Bookmark::where('story_id',$id)->get();
       $comments=Comment::where('story_id',$id)->get();
       $rec=Recommendation::where('story_id',$id)->get();
       if($story)
       $story->delete();
       if($bookmark)
       Bookmark::where('story_id',$id)->delete();
       if($comments)
       Comment::where('story_id',$id)->delete();
       if($rec)
       Recommendation::where('story_id',$id)->delete();
       return Redirect::to('login');
    }

  public function saveStory()
	{
	  $body=Input::get('body');
	  $id=Input::get('id');
    $user_id=Sentry::getUser()->id;
	  $story=Story::find($id);
	  $story->content=$body;
    if($story->type!=1)
    $story->type=2;
    $story->user_id=$user_id;
	  $story->save();
	}

	public function editStory($id)
	{ 
	  $story=Story::find($id);
    $user_id=$story->user_id;
    $user=User::find($user_id);
	  return View::make("edit_story_new")->with("user",$user)->with('id',$id)->with('story',$story); 
	  
	}

  public function deleteStory($id)
  {
     $story=Story::find($id);
     $bookmark=Bookmark::where('story_id',$id)->get();
     $comments=Comment::where('story_id',$id)->get();
     $rec=Recommendation::where('story_id',$id)->get();
     if($story)
     $story->delete();
     if($bookmark)
     Bookmark::where('story_id',$id)->delete();
     if($comments)
     Comment::where('story_id',$id)->delete();
     if($rec)
     Recommendation::where('story_id',$id)->delete();
     $user_id=Sentry::getUser()->id;
     $stories=Story::where('user_id',$user_id)->get();
     return View::make("draft_page")->with('stories',$stories);

  }

    public function publishStory($id)
    { 
      $story=Story::find($id);

      $story->type=1;
      $story->save();
      return Redirect::route('login'); 
    }
    public function publishStory_Post()
    { 
      $tag_name=Input::get('tag_name');
      $id=Input::get('story_id');
      $tag=Tag::where('name',$tag_name)->first();  
      $story=Story::find($id);
      if($story->content==NULL)
      $story->content=" <h3 class='graf graf--h3 graf--first'>Title  </h3><p class='graf graf--p'>Tell your story…</span><br></p>";
      if($story->user_id==0)
      $story->user_id=Sentry::getUser()->id;
      $story->type=1;
      if($tag==NULL && $tag_name !=NULL)
      {
        $tag=new Tag;
        $tag->name=$tag_name;
        $tag->save();
        $story->tag_id=$tag->id;
      }
      $story->save();
      return Redirect::route('login');; 
    }

	public function uploadStoryImage()
	{
        Log::info(Input::all());

        $image_url = "";

        if(Input::file()) {
            $image = Input::file('file');
            list($uSecFloat, $sec) = explode(" ", microtime());
            list($uSecInt, $uSec) = explode(".", $uSecFloat);
            $image_filename  = 'si' . $sec . '_' . $uSec . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('story_images'), $image_filename);
            $image_url = URL::to('story_images/'. $image_filename);
        }

        return $image_url;
	}
  }
