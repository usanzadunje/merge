<?php

namespace Usanzadunje\Core\Commands;

use Usanzadunje\Exceptions\Commands\ParameterMissingException;

class MakeController extends Command
{

    public function handle()
    {
        $name = $this->getArgumentIfExists('name') ?? null;
        $model = $this->getArgumentIfExists('model') ?? null;

        if (!$name) {
            ParameterMissingException::handle('name');
        }

        if (!$model) {
            $controllerStub = str_replace(
                "BlankController",
                $name,
                file_get_contents(__DIR__ . '/stubs/BlankController.php')
            );
        }else {
            $controllerStub = str_replace(
                "ModelController",
                $name,
                file_get_contents(__DIR__ . '/stubs/ModelController.php')
            );
            $controllerStub = str_replace(
                "StubModel",
                $model,
                $controllerStub
            );
            $controllerStub = str_replace(
                "stubModel",
                lcfirst($model),
                $controllerStub
            );
        }

        file_put_contents(base_path("app/Http/Controllers/$name.php"), $controllerStub);
    }
}