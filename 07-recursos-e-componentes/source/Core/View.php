<?php

namespace Source\Core;

use League\Plates\Engine;

class View
{
    /**
     * @var Engine $engine
     */
    private $engine;

    public function __construct()
    {
        $this->engine = Engine::create(CONF_VIEW_PATH, CONF_VIEW_EXT);
    }

    public function addFolder(string $name, string $path): View
    {
        $this->engine->addFolder($name, $path);
        return $this;
    }

    public function render(string $templateName, array $data): string
    {
        return $this->engine->render($templateName, $data);
    }

    /**
     * Get $engine
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }
}