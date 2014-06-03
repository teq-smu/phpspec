<?php namespace Smuller\Phpspec;

use InvalidArgumentException;

class Task {

    protected $title;

    protected $rating;

    public function __construct($title, $rating = 3)
    {
        $this->title = $title;

        $this->rating = 3;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

    public function setRating($rating)
    {
        if ( ! is_integer($rating) or ($rating <= 0) or ($rating > 5))
        {
            throw new InvalidArgumentException('Rating must be an integer between 0 and 5');
        }

        $this->rating = $rating;
    }

    public function getRating()
    {
        return $this->rating;
    }

}
