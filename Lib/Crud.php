<?php

abstract class Crud extends Di {

    abstract protected function create() ;
    abstract protected function read();
    abstract protected function update();
    abstract protected function delete();
}