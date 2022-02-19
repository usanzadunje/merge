<?php

namespace Usanzadunje\Playground\Observer;

use SplObserver;
use SplSubject;

class User implements SplSubject
{
    private array $observers = [];

    public function __construct()
    {
        $this->observers["*"] = [];
    }

    private function initEvent(string $event = '*')
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = '*')
    {
        $this->initEvent($event);

        $group = $this->observers[$event];
        $all = $this->observers['*'];

        return array_merge($group, $all);
    }

    /**
     * Attach an SplObserver
     * @link https://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     */
    public function attach(SplObserver $observer, string $event = '*')
    {
        $this->initEvent($event);

        $this->observers[$event][] = $observer;
    }

    /**
     * Detach an observer
     * @link https://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     */
    public function detach(SplObserver $observer, string $event = '*')
    {
        foreach ($this->getEventObservers($event) as $key => $value) {
            if ($value === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    /**
     * Notify an observer
     * @link https://php.net/manual/en/splsubject.notify.php
     * @return void
     */
    public function notify(string $event = '*', $data = null)
    {
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this,$event, $data);
        }
    }

    public function create($data)
    {
        $this->notify('pre:user:create', $data);
        echo "Created user";
        $this->notify('post:user:create', $data);
    }
}