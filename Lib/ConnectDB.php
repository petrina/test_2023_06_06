<?php

class ConnectDB extends Di {

    protected array $useClasses = [
        'Config',
    ];
    public ?PDO $pdo = null;

    public function __construct()
    {
        parent::__construct();
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $dsn = $this->config->get('dbtype').':host='.$this->config->get('dbhost').';dbname='.$this->config->get('dbname').';charset=utf8';
        $this->pdo = new PDO($dsn, $this->config->get('dbuser'), $this->config->get('dbpass'), $options);
    }
}