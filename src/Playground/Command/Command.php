<?php

namespace Usanzadunje\Playground\Command;

interface Command
{
    public function execute(): void;

    public function getId(): int;

    public function getStatus(): int;
}