<?php
class MainController extends BaseController{
	
	public function showhomepage(){
	
		return View::make('homepage');
	
	}
	
	public function showaddquestion(){

		return View::make('add_question');

	}

	public function processaddquestion(){
		
		$questions = new Question();

		$questions->Question = Input::get('Question');
		$questions->Context = Input::get('Context');
		$questions->Genre = Input::get('Genre');

		$questions->save();
		
		 return Redirect::to('/add_question')->with('flash_message', 'Question Succefully Posted!!');
	
	}

	public function showallquestions(){

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

		return View::make('view_all_questions')->with('questions',$questions);	
	}

	public function processallquestions(){

			if($_POST["added_question"]=='add'){
			// change button to follow or unfollow
				$user = User::find(Auth::user()->id);
				
				if (!$user->questions->contains($_POST["question_id"])) {
  				
					$user->questions()->attach($_POST["question_id"]);	
					return Redirect::to('/view_all_questions')->with('flash_message', 'Questions Succefully placed in your Library');
				
				}
				
				else{	
					return Redirect::to('/view_all_questions')->with('flash_message', 'You already have this question in your library');

				}
			}
	}

	public function showallmyforums(){

			$user=User::find(Auth::user()->id);	
			return View::make('view_all_my_forums')->with('user', $user);
	
}
	
	public function processallmyforums(){
	
		$user = User::find(Auth::user()->id);
		$user->questions()->detach($_POST["question_id"]);
		return View::make('view_all_my_forums')->with('user', $user);

	}

	public function showdebating(){
		
		$question = Question::find($_GET["question_id"]);	
		
		$answer = Answer::all();
		
		$all_answers = array();
		
		foreach($answer as $answers){
			
				if ($answers['question_id'] == $_GET["question_id"]){
					$all_answers[] = $answers;
				}
		}

		return View::make('debating')->with ('question', $question)->with('all_answers', $all_answers);

	}
	
	public function processdebating(){
	
		$answers = new Answer();
		
		$answers->user_id = Auth::user()->id;

		$answers->answer = Input::get('answer');
		$answers->question_id = Input::get('question_id');

		$answers->save();

		return "answered!!";

	
	}

}