<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

 Route::group(array('domain' => '{name}.'.Config::get('database.domain')), function(){

    Route::get('/{anything}',function($name,$anything){
      return Redirect::to('http://'.Config::get('database.domain').'/'.$anything);
    });

  });
 //medium

 Route::get('storydashboard', array('as' => 'storydashboard', 'uses' => 'StoryController@story'))->before('auth');

 Route::get('storypage', array('as' => 'storypage', 'uses' => 'StoryController@home'))->before('auth');
 
 Route::get('blog_editor', array('as' => 'blog_editor', 'uses' => 'StoryController@blog_editor'))->before('auth');
 
 Route::get('drafts', array('as' => 'drafts', 'uses' => 'StoryController@drafts'))->before('auth');

 Route::post('save-story', array("as"=>'save-story' ,"uses"=>'StoryController@saveStory'));

 Route::post('edit_password', array("as"=>'edit_password' ,"uses"=>'UserController@edit_password'));

 Route::post('edit_email', array("as"=>'edit_email' ,"uses"=>'UserController@edit_email'));

 Route::post('recommend', array('as' => 'recommend', 'uses' => 'StoryController@recommend'))->before('auth');

 Route::post('follow', array('as' => 'follow', 'uses' => 'StoryController@follow'))->before('auth');

 Route::post('unfollow', array('as' => 'unfollow', 'uses' => 'StoryController@unfollow'))->before('auth');

 Route::post('undo-recommend', array('as' => 'undo-recommend', 'uses' => 'StoryController@undo_recommend'))->before('auth');

 Route::post('comment', array('as' => 'comment', 'uses' => 'StoryController@comment'));

 Route::get('profile', array('as' => 'profile', 'uses' => 'UserController@profile'));

 Route::get('user/{id}', array('as' => 'userpage', 'uses' => 'UserController@userpage'));

 Route::post('update_profile', array('as' => 'update_profile', 'uses' => 'UserController@update_profile'));

 Route::post('bookmark', array('as' => 'bookmark', 'uses' => 'StoryController@bookmark'));

 Route::get('settings_medium', array('as' => 'settings_medium', 'uses' => 'StoryController@settings'));

 Route::post('unbookmark', array('as' => 'unbookmark', 'uses' => 'StoryController@unbookmark'));

 Route::get('tags/{id}', array('as' => 'tags', 'uses' => 'StoryController@tags'));

 Route::post('update-comment', array('as' => 'update-comment', 'uses' => 'StoryController@update_comment'));

 Route::get('display-story/{id}', array("as"=>'display-story' ,"uses"=>'StoryController@displayStory'));
  
 Route::get('edit-story/{id}', array("as"=>'edit-story' ,"uses"=>'StoryController@editStory'));

 Route::get('publish-story/{id}', array("as"=>'publish-story' ,"uses"=>'StoryController@publishStory'));

 Route::post('publish', array("as"=>'publish' ,"uses"=>'StoryController@publishStory_Post'));

 Route::get('delete/{id}', array("as"=>'delete' ,"uses"=>'StoryController@deleteStory'));

 Route::get('delete-story/{id}', array("as"=>'delete-story' ,"uses"=>'StoryController@admin_delete'));

 Route::post('upload-story-image', array("as"=>'upload-story-image', "uses"=>'StoryController@uploadStoryImage'));

 Route::get('login', array( 'as' => 'login', "uses"=>'StoryController@home'));

 Route::get('search', array('as' => 'search', 'uses' => 'StoryController@search'));

 Route::post('check_story', array('as' => 'check_story', 'uses' => 'StoryController@check_story'));

 //medium_end

   //Authenticate
  
  Route::get('authenticate','UserController@authenticate');
  

  Route::get('/', function()
  {
    return Redirect::to('login');
  });

  // Route::get('login', array( 'as' => 'login', function() {
  //   return View::make('login');
  // }));

  Route::get('register', array( 'as' => 'register', function() {
    return View::make('register');
  }));

  // Route::get('search', array('as' => 'search', 'uses' => 'UserController@search'));

  Route::post('register', array('as' => 'login', 'uses' =>  'UserController@saveUser'));
 
  Route::post('login', array('as' => 'login', 'uses' =>  'UserController@loginUser'));

  Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logoutUser'))->before('auth');

  Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'UserController@dashboard'))->before('auth');

  Route::get('blog/{name}', array('as' => 'blogdashboard', 'uses' => 'UserController@blogdashboard'))->before('auth');

  Route::get('create/blog', array('as' => 'createblog', 'uses' => 'UserController@createBlog'))->before('auth');

  Route::post('create/blog', 'UserController@saveBlog')->before('auth');

  Route::post('post/text', 'PostController@saveText')->before('auth');

  Route::post('post/quote', 'PostController@saveQuote')->before('auth');

  Route::post('post/video', 'PostController@saveVideo')->before('auth');

  Route::post('post/picture', 'PostController@savePicture')->before('auth');

  Route::post('post/audio', 'PostController@saveAudio')->before('auth');

  Route::post('post/chat', 'PostController@saveChat')->before('auth');

  Route::post('post/link', 'PostController@saveLink')->before('auth');

  Route::get('like/{post_id}', 'UserController@like')->before('auth');

  Route::get('unlike/{post_id}', 'UserController@unlike')->before('auth');

  Route::get('tagged/{name}', array('as' => 'tagged', 'uses' => 'UserController@tagboard'));

  Route::get('messages', array('as' => 'messages', 'uses' => 'BlogController@messages'))->before('auth');

  Route::post('message/send', 'BlogController@sendMessage')->before('auth');

  Route::get('message/delete/{id}', array( 'as' => 'deletemessage', 'uses' => 'BlogController@deleteMessage'))->before('auth');

  Route::get('blog/{name}/messages', array('as' => 'blogmessages', 'uses' => 'BlogController@blogMessages'))->before('auth');

  Route::get('settings', array('as' => 'settings', 'uses' => 'UserController@settings'))->before('auth');

  Route::post('user/changepassword', 'UserController@changePassword')->before('auth');

  Route::post('user/changeemail', 'UserController@changeEmail')->before('auth');

  Route::get('blog/{name}/settings', array('as' => 'blogsettings', 'uses' => 'BlogController@settings'))->before('auth');

  Route::post('blog/{name}/changeusername', 'BlogController@changeUsername')->before('auth');

  Route::post('blog/{name}/changedomain', 'BlogController@changeDomain')->before('auth');

  Route::post('blog/{name}/changeinfo', 'BlogController@changeInfo')->before('auth');

  Route::post('blog/{name}/changeprofilepicture', 'BlogController@changeProfilePicture')->before('auth');

  Route::post('reblog', 'BlogController@reblog')->before('auth');

  Route::get('customise/{name}', array('as' => 'customise', 'uses' => 'BlogController@customiseBlog'))->before('auth');

  Route::post('customise/{name}', 'BlogController@processCustomiseBlog')->before('auth');

  Route::get('superadmin/create', array('as' => 'superadmincreation', 'uses' => 'SuperadminController@register'));

  Route::post('superadmin/create', 'SuperadminController@processRegister');

  Route::get('post/delete/{id}', array('as' => 'postdelete', 'uses' => 'PostController@delete'))->before('auth');

  Route::get('post/edit/{id}', array('as' => 'postedit', 'uses' => 'PostController@edit'))->before('auth');

  Route::post('post/edit/{id}', 'PostController@update')->before('auth');

  Route::get('users',array('as' => 'usermanagement', 'uses' => 'SuperadminController@users'))->before('superadmin');

  Route::get('/ban/{id}','UserController@ban')->before('superadmin');

Route::get('/unban/{id}','UserController@unban')->before('superadmin');



  Route::get('privacy',function(){ return View::make('privacy'); });

  Route::get('terms',function(){ return View::make('terms'); });

  Route::get('adminsettings', array('as' => 'adminsettings', 'uses' => 'SuperadminController@adminSettings'))->before('superadmin');

  Route::post('adminsettings', 'SuperadminController@saveAdminSettings')->before('superadmin');
