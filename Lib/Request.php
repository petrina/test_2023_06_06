<?php

class Request extends Di {

    protected array $post = [];
    protected array $get = [];
    protected array $headers = [];

    public function __construct() {
        parent::__construct();
        $this->headers = apache_request_headers();
        $this->post = $_POST;
        $this->get = $_GET;
    }

    public function get(string|int $key, mixed $default = null):mixed
    {
        return ($this->get[$key]) ?? $default;
    }

    public function post(string|int $key, mixed $default = null):mixed
    {
        return ($this->post[$key]) ?? $default;
    }

    public function header(string|int $key, mixed $default = null):mixed
    {
        return ($this->headers[$key]) ?? $default;
    }
}