<?php

class Di {

    protected array $useClasses = [];

    public function __construct()
    {
        foreach ($this->useClasses as $useClass) {
            $class = new $useClass();
            $paramName = lcfirst($useClass);
            $this->{$paramName} = $class;
        }
    }
}