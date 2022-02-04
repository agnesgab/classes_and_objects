<?php

class Movie
{
    public string $title;
    public string $studio;
    public string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {

        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }


    /* @return string */
    public function getRating():string{

        return $this->rating;
    }


}

$allMovies = [
    $a = new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    $b = new Movie('Glass', 'Buena Vista International', 'PG13'),
    $c = new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG'),
    $d = new Movie('Test', 'Test', 'PG')

];


function getPG(array $allMovies):array{

    $onlyPGs = [];

    foreach($allMovies as $movie) {
        if($movie->getRating() === 'PG')
            $onlyPGs[] = $movie;

    }

    return $onlyPGs;
}

var_dump(getPG($allMovies));


