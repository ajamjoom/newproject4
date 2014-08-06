<?php

class Question extends Eloquent{
	 
	
	 public function users() {
            # Author has many Books
            return $this->belongsToMany('User', 'question_user', 'question_id', 'user_id');
        }
     public function responses(){
     	return $this->hasMany('Response');
     }
}