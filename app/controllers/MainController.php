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

		return "Forum is Published";
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
					return ' you have added the forum to your list!!';
				
				}
				
				else{	
				
				return ' You already have this in your personal library';

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
		return View::make('debating')->with ('question', $question);

	}
	
	public function processdebating(){
		//upliading files to database is not working(uploading audio files)
			//$answers = new Answer();
			//$answers->Answer = Input::file('Answer');
			//$answers->save();
			//return "Answer uploaded!!";
		//Answer by text
		

		$answers = new Answer();
		
		$answers->user_id = Auth::user()->id;

		$answers->answer = Input::get('answer');
		$answers->question_id = Input::get('question_id');
		//dd($answers);
		$answers->save();

		return "answered!!";

	
	}

}