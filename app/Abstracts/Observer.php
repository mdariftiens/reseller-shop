<?php


namespace App\Abstracts;


use Monooso\Unobserve\CanMute;

abstract class Observer
{
    use CanMute;

    public function creating(){}

    public function created(){}

    public function editing(){}

    public function edited(){}

    public function updating(){}

    public function updated(){}

    public function deleting(){}

    public function deleted(){}
}
