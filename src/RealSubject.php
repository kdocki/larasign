<?php

class RealSubject implements SplSubject
{
    private $observers;

    public function __construct($name)
    {
        $this->name = $name;
        $this->observers = new SplObjectStorage;
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->update($this);
        }
    }
}
