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

Route::get('/', array( 'before' => 'auth','uses' => 'MainController@showhomepage'));

Route::get('/add_question', array( 'before' => 'auth','uses' => 'MainController@showaddquestion'));

Route::post('/add_question', array( 'before' => 'auth','uses' => 'MainController@processaddquestion'));

Route::get('/view_all_questions', array( 'before' => 'auth','uses' => 'MainController@showallquestions'));

Route::post('/view_all_questions', array( 'before' => 'auth','uses' => 'MainController@processallquestions'));

Route::get('/view_all_my_forums', array( 'before' => 'auth','uses' => 'MainController@showallmyforums'));

Route::post('/view_all_my_forums', array( 'before' => 'auth','uses' => 'MainController@processallmyforums'));

Route::get('/debating', array( 'before' => 'auth', 'uses' => 'MainController@showdebating'));

Route::post('/debating', array( 'before' => 'auth', 'uses' => 'MainController@processdebating'));

Route::get('/signup', array( 'before' => 'guest', 'uses' => 'AuthenticationController@showsignup'));

Route::post('/signup', array('before' => 'csrf', 'uses' => 'AuthenticationController@proccesssignup'));

Route::get('/login', array( 'before' => 'guest', 'uses' => 'AuthenticationController@showlogin'));

Route::post('/login', array('before' => 'csrf', 'uses' => 'AuthenticationController@proccesslogin'));

Route::get('/logout', 'AuthenticationController@logout');

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

