<?php

class Review extends Eloquent
{

    // Validation rules for the ratings
    public function getCreateRules()
    {
        return array(
            'comment'=>'required|min:55',
            'rating'=>'required|integer|between:1,5'
        );
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function club()
    {
        return $this->belongsTo('Club');
    }

    // Scopes
    public function scopeApproved($query)
    {
       	return $query->where('approved', true);
    }

    public function scopeSpam($query)
    {
       	return $query->where('spam', true);
    }

    public function scopeNotSpam($query)
    {
       	return $query->where('spam', false);
    }

    // Attribute presenters
    public function getTimeagoAttribute()
    {
    	$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    	return $date;
    }

    // this function takes in club ID, comment and the rating and attaches the review to the club by its ID, then the average rating for the club is recalculated
    public function storeReviewForclub($clubID, $comment, $rating)
    {
        $club = club::find($clubID);

        $this->user_id = Auth::user()->id;
        $this->comment = $comment;
        $this->rating = $rating;
        $club->reviews()->save($this);

        // recalculate ratings for the specified club
        $club->recalculateRating($rating);
    }
}