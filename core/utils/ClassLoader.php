<?php

class ClassLoader {

	protected $classes = array();

	protected static $instance;

	static function getInstance() {
		if (self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	function load($dirs) {
		foreach ($dirs as $dir) {
			$this->load_from_dir($dir);
		}
	}

	protected function load_from_dir($dir) {
		$dirIter = new RecursiveDirectoryIterator($dir);
		$iter = new RecursiveIteratorIterator($dirIter);
		$regex = new RegexIterator($iter, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);
		$regex->next();
		while ($regex->valid()) {
			$file = new SplFileInfo($regex->current()[0]);
			$this->classes[$file->getBasename('.php')] = $file->getRealPath();
			$regex->next();
		}
	}

	function get($className) {
		if (!isset($this->classes[$className])) {
			return null;
			throw new ClassNotFoundException($className);
		}
		return $this->classes[$className];
	}

	function classExists($class_name) {
		return isset($this->classes[$class_name]);
	}
}
