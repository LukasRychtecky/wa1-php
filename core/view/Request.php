<?php

class Request {

	protected $get;
	protected $request;
	protected $post;
	protected $server;

	function __construct($get, $post, $request, $server) {
		$this->get = $get;
		$this->post = $post;
		$this->request = $request;
		$this->server = $server;
	}

	public function getGet() {
		return $this->get;
	}

	public function getPost() {
		return $this->post;
	}

	public function getRequest() {
		return $this->request;
	}

	public function getServer() {
		return $this->server;
	}
}
