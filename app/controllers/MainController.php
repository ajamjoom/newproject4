<?php

class MainController extends BaseController{
	
	public function showhomepage(){

		return View::make('homepage');
	
	}
	
	public function showaddquestion(){

		return View::make('add_question');

	}

	public function processaddquestion(){
		//rules to validate for when adding a question 
        //context field it not mandatory
        $rules = array(
    		'Question' => 'required',   
    		'Genre' => 'required',   

		);  
		$validator = Validator::make(Input::all(), $rules);
	 if($validator->fails()) {
            //what to print when validation for new user doesn't work
    		return Redirect::to('/add_question')
        		->with('flash_message', '<div class="alert alert-danger" role="alert">Adding Question Failed failed; please fix the errors listed below.</div>')
        		->withInput()
        		->withErrors($validator);
			}
		//when a user adds a questions through the form in the add_question page this code adds the question (creates new question)->POST
		$questions = new Question();

		$questions->Question = Input::get('Question');
		$questions->Context = Input::get('Context');
		$questions->Genre = Input::get('Genre');
try{
		$questions->save();
	}
	catch(Exception $e){
		 return Redirect::to('/add_question')->with('flash_message','<div class="alert alert-danger" role="alert">Adding Question failed, please try again</div>')
           ->withInput();
	}
		//if question is succefully created then send flash txt notifying the user
		 return Redirect::to('/add_question')->with('flash_message', '<div class="alert alert-success" role="alert">Question Succefully Posted!!</div>');
	}


	public function showallquestions(){
//got this chunk of code's structure from foobooks->search method
		$query = Input::get('query');

	# If there is a query, search the library with that query
		if($query) {

		# Here's a better option because it searches across multiple fields
			$questions = Question::where('Question', 'LIKE', "%$query%")
				->orWhere('Context', 'LIKE', "%$query%")
				->orWhere('Genre', 'LIKE', "%$query%")
				->get();

		}
	# Otherwise, just fetch all books
		else {
			$questions = Question::all();	
		}
//if there is a search then only pass the "searched" for questions, if no search is placed then place all questions available and pass it with the view
		return View::make('view_all_questions')->with('questions',$questions);	
	}

	public function processallquestions(){
		//if user selected to add question his library
			if($_POST["added_question"]=='add'){
			// change button to follow/unfollow
				$user = User::find(Auth::user()->id);
				//if question doesnt already exist in library
				if (!$user->questions->contains($_POST["question_id"])) {
  				
					$user->questions()->attach($_POST["question_id"]);	
					return Redirect::to('/view_all_questions')->with('flash_message', '<div class="alert alert-success" role="alert">Questions Succefully placed in your Library</div>');

				}
				//if question already exists in library then don't add it again 
				else{	
					return Redirect::to('/view_all_questions')->with('flash_message', '<div class="alert alert-warning" role="alert">You already have this question in your library</div>');

				}
			}
	}

	public function showallmyforums(){

			$user=User::find(Auth::user()->id);	
			return View::make('view_all_my_forums')->with('user', $user);	
	}
	
	public function processallmyforums(){
		//deleting questions from your library
		$user = User::find(Auth::user()->id);
		$user->questions()->detach($_POST["question_id"]);
		return Redirect::to('view_all_my_forums')->with('user', $user)->with('flash_message','<div class="alert alert-success" role="alert">Question removed from library</div>');

	}

	public function showdebating(){
		
		$user = User::find(Auth::user()->id);
		//get the question that you previosly clicked on so it shows on top of the page
		$question = Question::find($_GET["question_id"]);	
		$answer = Answer::all();
		//array of all answers for that 
		$all_answers = array();
		
		foreach($answer as $answers){
			//if answer is for the question in hand then add it to the array of answers
				if ($answers['question_id'] == $_GET["question_id"]){
					$all_answers[] = $answers;
				}
		}

		return View::make('debating')->with ('question', $question)->with('all_answers', $all_answers)->with ('user', $user);

	}
	
	public function processdebating(){
	//create an answer for the question
		$answers = new Answer();
		$answers->user_id = Auth::user()->id;
		$answers->answer = Input::get('answer');
		$answers->question_id = Input::get('question_id');
		$answers->save();
		
		$user = User::find(Auth::user()->id);
		$question = Question::find(Input::get('question_id'));	
		$answer = Answer::all();
		$all_answers = array();
		
		foreach($answer as $answers){
			
				if ($answers['question_id'] == Input::get('question_id')){
					$all_answers[] = $answers;
				}
		}

		return View::make('debating')->with ('question', $question)->with('all_answers', $all_answers)->with ('user', $user);
	
	}

}