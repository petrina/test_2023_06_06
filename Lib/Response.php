<?php

class Response extends Di{

    protected int $status = 200;
    protected array $headers = [];
    protected string $data = '';

    public function setStatus(int $status) : Response {
        $this->status = $status;
        return $this;
    }

    public function setHeader(string $headerKey, string $headerValue) : Response {
        $this->headers[ucfirst(mb_strtolower($headerKey))] = $headerValue;
        return $this;
    }

    public function setData(string $data) : Response {
        $this->data = $data;
        return $this;
    }

    public function show(): void {
        http_response_code($this->status);
        foreach ($this->headers as $headerKey => $headerValue) {
            header($headerKey.': '.$headerValue);
        }
        echo $this->data;
        exit;
    }
}