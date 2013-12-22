<?php

require_once 'Client.php';
require_once 'QueryBuilder.php';
require_once 'Inspector.php';

class ClientPool {

	protected $config;
	protected $conn;

	function __construct($config) {
		$this->config = $config;
	}

	function pull($model) {
		$this->buildConnection();
		return new Client($this->conn, $model, new QueryBuilder(), new Inspector());
	}

	protected function buildConnection() {
		if ($this->conn === null) {
			$this->conn = new PDO("{$this->config['driver']}:dbname={$this->config['name']}", $this->config['login'], $this->config['passwd']);
		}
	}
}
