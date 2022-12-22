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
        $this->path = str_replace('.', '/', $path) . '.html';
        $this->absolutePath = resource_path('views/' . $this->path);
        $this->parameters = $parameters;
    }

    public function with($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @throws Exception
     */
    public function render(): string
    {
        if (!file_exists($this->absolutePath)) {
            throw new Exception(sprintf('The file %s could not be found.', $this->absolutePath));
        }

        $output = file_get_contents($this->absolutePath);

        $this->checkIfExtendsTemplate($output);

        if (!$this->parameters) {
            return $output;
        }

        foreach ($this->parameters as $key => $value) {
            $key = "\\$$key";

            /**
             * Matches variables defined between '{{' and '}}' characters inside template
             *
             * e.g. {{ $variable }} | {{$variable}} | {{    $variable        }}
             * {{
             * $variable
             * }}
             */
            $output = preg_replace("/{{\s{0,}$key\s{0,}}}/", $value, $output);
        }

        return $output;
    }

    private function checkIfExtendsTemplate(string $output): string {
        preg_match("/@extends'(\d+)'/", $output, $matches);

        dd($matches);

        return $output;
    }
}