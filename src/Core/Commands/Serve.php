<?php

namespace Usanzadunje\Core\Commands;

class Serve extends Command
{
    public function handle()
    {
        $host = $this->getArgumentIfExists('host') ?? 'localhost';
        $port = $this->getArgumentIfExists('port') ?? 8080;

        shell_exec("php -S $host:$port -t public/");
    }
}