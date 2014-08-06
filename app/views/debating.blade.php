@extends('_master')
 
 @section('title')
 
 		Forum

 @stop

 @section('content')

<h1>Forum</h1>

<br>
{{"Question:"}}
{{$question['Question']}}
<br>
{{"Context:"}}
{{$question['Context']}}
<br>
{{"Genre:"}}
{{$question['Genre']}}
<br>
<hr>
<hr>

<h2>Answers</h2>

<br>
@foreach( $all_answers as $answers)
{{$user['username']}}
{{':'}}
<br>
{{$answers['answer']}}
<hr>
<br>
@endforeach

{{ Form::open(array('url' => '/debating', 'method' => 'POST')) }}

    
    Answer: {{ Form::textarea('answer') }} <br><br>
    {{ Form::hidden('question_id', $question['id']) }}


    {{ Form::submit('Submit Answer!') }}

  {{ Form::close() }}

 @stop
