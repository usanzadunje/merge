<?php

namespace Usanzadunje\Core;

use Exception;

class Template
{
    public string $path;
    public string $absolutePath;
    public array $parameters;

    public function __construct(string $path, array $parameters = [])
    {
        $this->path = $path;
        $this->absolutePath = resource_path('views/' . $path);
        $this->parameters = $parameters;
    }

    public function with($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @throws Exception
     */
    public function render()
    {
        if (!file_exists($this->absolutePath)) {
            throw new Exception(sprintf('The file %s could not be found.', $this->absolutePath));
        }

        $output = file_get_contents($this->absolutePath);

        foreach ($this->parameters as $key => $value) {
            $output = str_replace("{{ $key }}", $value, $output);
        }

        return $output;
    }
}