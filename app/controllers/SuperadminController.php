<?php

  class SuperadminController extends BaseController {

  	public function register()
  	{
  		if(!Sentry::findAllUsersWithAccess(array('admin')))
		{
			return View::make('adminRegister');
		}
  		else
  		{
  			return Redirect::route('login');
  		}
  	}

  	public function processRegister()
  	{
  		try
      {
        // Create the user
        $user = Sentry::createUser(array(
                                     'email'      => Input::get('email'),
                                     'password'   => Input::get('password'),
                                     'username'   => Input::get('username'),
                                     'activated'  => true
                                   ));

        // Find the group using the group id
        $adminGroup = Sentry::findGroupById(2);

        // Assign the group to the user
        $user->addGroup($adminGroup);

        // Log the user in
        Sentry::login($user, false);
      }
      catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
      {
        return Redirect::route('superadmincreation')->withInput(Input::except('password'))->with('error', 'Login Field is Required');
      }
      catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
      {
        return Redirect::route('superadmincreation')->withInput()->with('error', 'Password Field is Required');
      }
      catch (Cartalyst\Sentry\Users\UserExistsException $e)
      {
        return Redirect::route('superadmincreation')->withInput(Input::except('password'))->with('error', 'User Already Exists');
      }
      catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
      {
        return Redirect::route('superadmincreation')->withInput(Input::except('password'))->with('error', 'Group Not Found');
      }


      // Redirect to dashboard
      return Redirect::route('login')->with('success', 'Registration Successful');
  	}

    public function users(){
      $users = User::paginate(10);
      return View::make('users')->withUsers($users);
    }

    public function adminSettings()
    {
      $headercode = Setting::where('option', '=', 'header_code')->first();
      $footercode = Setting::where('option', '=', 'footer_code')->first();

      $user = User::find(Sentry::getUser()->id);
      $userBlogs = $user->blogs->all();
      
      return View::make('adminSettings')->withHeadercode($headercode)->withFootercode($footercode)->withBlogs($userBlogs)->withUser($user);
    }

    public function saveAdminSettings()
    {
      if(isset($_POST['headercode']))
      {
        $headercode = Setting::where('option', '=', 'header_code')->first();
        $headercode->value = htmlentities(Input::get('headercode'));
        $headercode->save();
      }
      elseif(isset($_POST['footercode']))
      {
        $footercode = Setting::where('option', '=', 'footer_code')->first();
        $footercode->value = htmlentities(Input::get('footercode'));
        $footercode->save();
      }

      return Redirect::route('adminsettings')->withSuccess('Settings saved');
    }
  }

?>
