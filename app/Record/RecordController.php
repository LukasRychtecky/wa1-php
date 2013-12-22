<?php

class RecordController extends Controller {

	function index() {
		$this->template->records = $this->client->all();
	}
}
