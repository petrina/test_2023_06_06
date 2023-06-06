<?php

class Config extends Di {

    protected array $config = [];

    public function __construct()
    {
        parent::__construct();
        $path = dirname(__DIR__).'/config.php';
        $this->config = require dirname(__DIR__).'/config.php';
    }

    public function get(string $key, mixed $default = null): mixed {
        return $this->config[$key] ?? $default;
    }
}