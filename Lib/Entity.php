<?php

class Entity extends Di {

    protected array $data = [];

    public function __set(string $name, string $value): void {
        $this->data[$name] = $value;
    }

    public function __get(string $name): mixed {
        return ($this->data[$name]) ?? null;
    }

    public function setAttributes(array $params = []): void {
        foreach ($params as $name => $value) {
            $this->data[$name] = $value;
        }
    }

    public function getAttributes() : array {
        return $this->data;
    }
}