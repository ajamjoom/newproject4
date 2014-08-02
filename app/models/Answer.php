<?php

class Answer extends Eloquent{
	 
	
	 public function questions() {
            # Author has many Books
            return $this->belongsTo('Question');
        }
}