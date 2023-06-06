<?php

class Model extends CrudDB {

    public function getById(int $id) : Model {
        return $this->setId($id)->read();
    }

    public function getAll():array {
        $stmt = $this->connectDB->pdo->prepare('SELECT * FROM '.$this->table);
        $stmt->execute();
        $items = $stmt->fetchAll();

        $result = [];
        foreach ($items as $item) {
            $model = new self;
            $model->setItemData($item);
            $result[] = $model;
        }
        return $result;
    }

    public function save() {
        if (!empty($this->getId())) {
            $this->update();
        } else {
            $this->create();
        }
    }
}