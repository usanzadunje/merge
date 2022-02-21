<?php

namespace Usanzadunje\Core\Commands;

use Exception;

class CommandRouter
{
    private static string $name;

    public static function initialize(array $cliArguments) : void
    {
        try {
            $self = new static();

            $commandName = $self->getName($cliArguments);

            /**
             * Removing first 2 arguments which are not relevant as command arguments.
             * 1 - Name of the file
             * 2 - Name of the command
             */
            array_splice($cliArguments, 0, 2);

            $command = $self->generateProperCommand($commandName, $cliArguments);

            $command->handle();
        }catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @throws Exception
     */
    private function getName(array $cliArguments): string
    {
        if (!array_key_exists(1, $cliArguments)) {
            throw new Exception("Command does not exist \n");
        }

        return $cliArguments[1];
    }

    /**
     * @throws Exception
     */
    private function generateProperCommand(string $commandName, array $arguments) : Command
    {
        return match ($commandName) {
            'serve' => new Serve($arguments),
            default => throw new Exception("Unknown command \n"),
        };
    }
}