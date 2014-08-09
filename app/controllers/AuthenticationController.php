<?php
class AuthenticationController extends BaseController{
	
	public function showlogin(){
	
		return View::make('login');

	}
	
	public function proccesslogin(){
	
		$credentials = Input::only('username', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                //if user is not new but have just signed In and he put the correct credentials then he gets a succes massege welcoming him back
                return Redirect::intended('/')->with('flash_message', '<div class="alert alert-success" role="alert">Welcome Back!!! </div>');
            }
           
            else {
                //if Singing In doesn't work then user is alerted by a flash txt
                return Redirect::to('/login')->with('flash_message', '<div class="alert alert-danger" role="alert">Log in failed; please try again.</div>');	
            }

            return Redirect::to('login');

	}
	
	public function showsignup(){

		return View::make('signup');
		
	}
	
	public function proccesssignup(){
		//rules to validate for when signing Up a new user
        $rules = array(
    		'email' => 'email|unique:users,email',
    		'password' => 'min:6'   
		);          

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
            //what to print when validation for new user doesn't work
    		return Redirect::to('/signup')
        		->with('flash_message', '<div class="alert alert-danger" role="alert">Sign up failed; please fix the errors listed below.</div>')
        		->withInput()
        		->withErrors($validator);
			}
		 //If Sign Up works then a new user is created
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
                return Redirect::to('/signup')->with('flash_message','<div class="alert alert-danger" role="alert">Sign Up failed, please try again</div>')
           ->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/')->with('flash_message', '<div class="alert alert-success" role="alert">You have succefully created an account </div>');

		
	}

	public function logout(){

	Auth::logout();

    # Send them to the homepage then from there they will get redirected to the log in page because the homepage is locked up
    return Redirect::to('/');

	}
	
}