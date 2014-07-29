<?php
class AuthenticationController extends BaseController{
	
	public function showlogin(){
	
		return View::make('login');

	}
	
	public function proccesslogin(){
	
		$credentials = Input::only('username', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');

	}
	
	public function showsignup(){

		return View::make('signup');
		
	}
	
	public function proccesssignup(){

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
                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/')->with('flash_message', 'Welcome to What??');

		
	}

	public function logout(){

	Auth::logout();

    # Send them to the homepage
    return Redirect::to('/');

	}
	
}