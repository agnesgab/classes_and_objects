<?php

class VideoStore
{

    public array $allVideos;

    public function addVideo(Video $video): Video
    {
        return $this->allVideos[] = $video;
    }

    /**
     * @return array
     */
    public function getAllVideos(): array
    {
            return $this->allVideos;

    }


    public function listAllVideos(): void
    {
        if(isset($this->allVideos)) {
            foreach ($this->allVideos as $video) {

                echo "--------------------" . PHP_EOL;
                echo "Title: {$video->getTitle()}" . PHP_EOL;
                echo "Average rating: {$video->returnRating()}" . PHP_EOL;
                if ($video->getAvailability()) {
                    echo "Available" . PHP_EOL;
                } else {
                    echo "Not Available" . PHP_EOL;
                }

            }
        } else {
            echo "Nothing available yet" . PHP_EOL;
        }
    }
}