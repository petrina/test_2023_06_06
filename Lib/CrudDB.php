<?php

class CrudDB extends Crud {

    protected string $table = '';
    protected string $primaryKey = 'id';

    protected array $useClasses = [
        'ConnectDB',
        'Entity',
    ];

    public function getId(): ?int {
        return $this->entity->id;
    }

    protected function setId(int $id): CrudDB {
        $this->entity->id = $id;
        return $this;
    }

    protected function setItemData(array $data):void {
        $this->entity->setAttributes($data);
    }

    protected function create() {
        $where = $what = $params = [];
        foreach ($this->entity->getAttributes() as $key => $value) {
            $where[] = $key;
            $what[] = ':'.$key;
            $params[$key] = $value;
        }
        $sql = 'INSERT INTO '.$this->table.' ('.implode(',', $where).') VALUES ('.implode(',',$what).')';
        $stmt = $this->connectDB->pdo->prepare($sql);
        $stmt->execute($params);
    }
    protected function read():CrudDB {
        $stmt = $this->connectDB->pdo->prepare('SELECT * FROM '.$this->table.' WHERE '.$this->primaryKey.' = ?');
        $stmt->execute([$this->entity->id]);
        $item = $stmt->fetch();
        $this->setItemData($item);
        return $this;
    }
    protected function update() {}
    protected function delete() {}
}