<?php

use Flasher\Notyf\Prime\NotyfInterface;

function notifyError($message) {
    notyf()
    ->dismissible(true)
    ->error($message);
}

function notifySuccess($message) {
    notyf()
    ->dismissible(true)
    ->success($message);
}

function notifyInfo($message) {
    notyf()
    ->dismissible(true)
    ->info($message);
}




