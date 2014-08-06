@extends('_master')
 
 @section('title')
 
 		Debate/Discuss

 @stop

 @section('content')

 	<h1>Debate here</h1>

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
<!--
{{ Form::open(array('url' => 'debating','files' => true)) }}

{{ Form::label('audio_file:', 'Audio File:') }}
{{ Form::file('avatar') }}
{{ Form::submit('Upload!') }}

{{ Form::close() }}
-->
{{ Form::open(array('url' => '/debating', 'method' => 'POST')) }}

    
    Answer: {{ Form::textarea('answer') }} <br><br>
    {{ Form::text('question_id', $question['id']) }}


    {{ Form::submit('Submit Answer!') }}

  {{ Form::close() }}
 
 @stop
