<?php

abstract class BaseModel {
	static $table;

	private $pk;

	function setPk($pk) {
		$this->pk = $pk;
	}

	function getPk() {
		return $this->pk;
	}
}
