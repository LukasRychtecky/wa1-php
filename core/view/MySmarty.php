<?php

class MySmarty extends Smarty {

	public function __construct() {
		parent::__construct();
		$this->compile_dir = "var/templates_c";
		$this->cache_dir = "var/cache";
	}
}
