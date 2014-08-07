<?php
class AuthenticationController extends BaseController{
	
	public function showlogin(){
	
		return View::make('login');

	}
	
	public function proccesslogin(){
	
		$credentials = Input::only('username', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/')->with('flash_message', '<div class="alert alert-success" role="alert">Welcome Back!!! </div>');
            }
            else {
                return Redirect::to('/login')->with('flash_message', '<div class="alert alert-danger" role="alert">Log in failed; please try again.</div>');
        		
            }

            return Redirect::to('login');

	}
	
	public function showsignup(){

		return View::make('signup');
		
	}
	
	public function proccesssignup(){
		$rules = array(
    		'email' => 'email|unique:users,email',
    		'password' => 'min:6'   
		);          

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

    		return Redirect::to('/signup')
        		->with('flash_message', "<div class='alert alert-danger' role='alert'>Sign up failed; please fix the errors listed below.</div>");
        	//show errors not working
        		//->withInput();
        	//	->withErrors($validator);
			}
		 
		 $user = new User;
           
         $user->username = Input::get('username');
         $user->email    = Input::get('email');
         $user->password = Hash::make(Input::get('password'));

            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/signup')->with('flash_message','<div class="alert alert-danger" role="alert">Sign Up failed, please try again</div>');
           //->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/')->with('flash_message', '<div class="alert alert-success" role="alert">You have succefully created logged in </div>');

		
	}

	public function logout(){

	Auth::logout();

    # Send them to the homepage
    return Redirect::to('/');

	}
	
}