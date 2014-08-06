<?php

class Answer extends Eloquent{
	 
	
	 public function users() {
            return $this->belongsTo('User');
        }
     public function questions(){
     	return $this->belongsTo('Question');
     }
}
