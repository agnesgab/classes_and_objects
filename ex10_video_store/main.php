<?php

require_once 'Video.php';
require_once 'VideoStore.php';

$store = new VideoStore();


while (true) {
    echo PHP_EOL;
    echo "VIDEO STORE" . PHP_EOL;
    echo "[1] Add video | ";
    echo "[2] Rent video | ";
    echo "[3] Return video | ";
    echo "[4] List all videos | ";
    echo "[5] Add rating | ";
    echo "[Any] Exit";
    echo PHP_EOL;
    $input = (int)readline('Select: ');
    echo PHP_EOL;


    switch ($input) {
        case 1:
            $video = new Video($title = readline('Title: '));
            $store->addVideo($video);
            echo 'New video added!' . PHP_EOL;
            break;
        case 2:
            if (!empty($store->getAllVideos())) {
                echo "Available Videos:" . PHP_EOL;
                foreach ($store->getAllVideos() as $index => $video) {
                    if ($video->getAvailability() === true) {
                        echo "[$index] {$video->getTitle()}" . PHP_EOL;
                    }
                }

                echo "Which one you would like to rent?" . PHP_EOL;
                $selectedVideoIndex = (int)readline('Select: ');
                $store->getAllVideos()[$selectedVideoIndex]->checkout();
                echo PHP_EOL;
                echo $store->getAllVideos()[$selectedVideoIndex]->getTitle() . " rented!" . PHP_EOL;

            } else {
                echo "Nothing available yet" . PHP_EOL;
                break;
            }

            break;
        case 3:
            echo "Rented videos:" . PHP_EOL;

            foreach ($store->getAllVideos() as $index => $video) {
                if ($video->getAvailability() === false) {
                    echo "[$index] {$video->getTitle()}" . PHP_EOL;
                }
            }

            echo "Which one you would like to return?" . PHP_EOL;
            $selectedVideoIndex = (int)readline('Select: ');
            echo PHP_EOL;
            $store->getAllVideos()[$selectedVideoIndex]->returnBack();
            echo $store->getAllVideos()[$selectedVideoIndex]->getTitle() . " retruned!" . PHP_EOL;

            break;
        case 4:
            $store->listAllVideos();
            break;
        case 5:


            foreach ($store->getAllVideos() as $index => $video) {

                echo "[$index] {$video->getTitle()}" . PHP_EOL;
                echo "Rating: {$video->returnRating()}" . PHP_EOL;
                echo "-----------------" . PHP_EOL;

            }


            echo "Choose to add rating" . PHP_EOL;
            $selectedVideoIndex = (int)readline('Select: ');

            $ratingInput = (int)readline('Add rating (1-5): ');

            $store->getAllVideos()[$selectedVideoIndex]->setRating($ratingInput);

            echo PHP_EOL;
            echo "Rating saved!";
            break;
        default:
            exit;
    }
}



