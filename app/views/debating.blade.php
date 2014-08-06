@extends('_master')
 
 @section('title')
 
 		Forum

 @stop

 @section('content')

 	<h1>Forum</h1>

<br>
{{$question['Question']}}
<br>
{{$question['Context']}}
<br>
{{$question['Genre']}}
<br>
<hr>
<hr>
@foreach( $all_answers as $answers)
{{$answers['answer']}}
<br>
@endforeach

{{ Form::open(array('url' => '/debating', 'method' => 'POST')) }}

    
    Answer: {{ Form::textarea('answer') }} <br><br>
    {{ Form::text('question_id', $question['id']) }}


    {{ Form::submit('Submit Answer!') }}

  {{ Form::close() }}

 @stop
