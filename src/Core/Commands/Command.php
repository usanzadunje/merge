<?php

namespace Usanzadunje\Core\Commands;

use Exception;

abstract class Command
{
    protected array $arguments;

    public function __construct(array $cliArguments)
    {
        $this->arguments = $this->getCommandArguments($cliArguments);
    }

    abstract public function handle();

    private function getCommandArguments(array $cliArguments): array
    {
        $arguments = [];

        foreach ($cliArguments as $cliArgument) {
            if (str_starts_with($cliArgument, '--')) {
                $arguments[] = $cliArgument;
            }
        }

        return $this->parseCommandArguments($arguments);
    }

    private function parseCommandArguments(array $arguments): array
    {
        $parsedArguments = [];

        foreach ($arguments as $argument) {
            $argument = str_replace('--', '', $argument);
            $argumentParts = explode('=', $argument);

            $parsedArguments[$argumentParts[0]] = $argumentParts[1];
        }

        return $parsedArguments;
    }

    public function arguments()
    {
        return $this->arguments;
    }

    public function hasArgument(string $argumentName)
    {
        return array_key_exists($argumentName, $this->arguments);
    }

    public function getArgumentIfExists(string $argumentName)
    {
        if (!$this->hasArgument($argumentName)) {
            return null;
        }

        return $this->arguments[$argumentName];
    }
}