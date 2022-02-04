<?php

class Video
{

    public string $title;
    public bool $availability;
    public float $rating;
    public int $count;

    /**
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
        $this->availability = true;
        $this->rating = 0;
        $this->count = 0;
    }

    /** @param string * */
    public function getTitle(): string
    {
        return $this->title;
    }

    /** @param bool * */
    public function getAvailability(): bool
    {
        return $this->availability;
    }

    /** @param float * */
    public function getRating(): float
    {
        return $this->rating;
    }

    /** @param bool * */
    public function checkout(): bool
    {
        return $this->availability = !$this->availability;
    }

    /** @param bool * */
    public function returnBack(): bool
    {
        return $this->availability = !$this->availability;
    }

    /** @param float * */
    public function receiveRating()
    {
        return $this->rating = (int)readline('Rating: ') + $this->rating;

    }


    public function addCount(){
        return $this->count += 1;
    }

    public function getAverageRating(){
        return $this->rating/$this->addCount();
    }


}