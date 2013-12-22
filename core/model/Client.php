<?php

class Client {

	protected $con;
	protected $model;
	protected $builder;
	protected $inspector;

	function __construct(PDO $con, $model, QueryBuilder $builder, Inspector $inspector) {
		$this->con = $con;
		$this->model = $model;
		$this->builder = $builder;
		$this->inspector = $inspector;
	}

	function all() {
		$stmt = $this->con->prepare($this->builder->buildSelect($this->model));
		$stmt->execute();

		$result = array();
		foreach ($stmt->fetchAll() as $row) {
			$result[] = $this->inspector->toModel($row, $this->model);
		}
		return $result;
	}

	function create(BaseModel $model) {
		$query = $this->builder->buildInsert($model, $this->inspector->toData($model));
		$stmt = $this->con->prepare($query);

		if (!$stmt->execute()) {
			$err = $stmt->errorInfo();
			throw new PDOException($err[2], $err[1]);
		}
	}
}
