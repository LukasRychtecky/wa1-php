<?php

class Inspector {

	protected $props = array();
	protected $ref;

	function toModel($data, $class) {
		$this->fetchProperties($class);
		$model = new $class();

		foreach ($this->props as $prop) {
			$setter = $this->getMethod("set", $prop);
			$setter->invoke($model, $data[$prop]);
		}
		return $model;
	}

	function toData($model) {
		$this->fetchProperties($model);
		$data = array();

		foreach ($this->props as $prop) {
			if ($prop === $model->getPk()) continue;
			$getter = $this->getMethod("get", $prop);
			$data[$prop] = $getter->invoke($model);
		}
		return $data;
	}

	protected function getMethod($prefix, $prop) {
		return $this->ref->getMethod($prefix . ucfirst($prop));
	}

	protected function fetchProperties($model) {

		if (!empty($this->props)) return;

		$this->ref = new ReflectionClass($model);
		$props = $this->ref->getProperties();
		foreach ($props as $prop) {
			if ($prop->isStatic()) continue;
			$this->props[] = $prop->getName();
		}
	}
}
