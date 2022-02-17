<?php

namespace Usanzadunje\Playground;

class Test
{
    private $arr = [];

    public function __construct()
    {
        $this->arr = ['jedan', 'dva', 'tri'];
    }

    public function isEmpty(): bool
    {
        return !count($this->arr);
    }

    public function add(int $number): void
    {
        $this->arr[] = $number;
    }

    public function work(): void
    {
        while (!$this->isEmpty()) {
            echo $this->arr[0];

            $this->execute();
        }
    }

    /**
     * For our convenience, the Queue object is a Singleton.
     */
    public static function get(): Test
    {
        static $instance;
        if (!$instance) {
            $instance = new Test();
        }

        return $instance;
    }

    private function execute()
    {
        echo $this->arr[];

        unset($this->arr[0]);
    }
}
