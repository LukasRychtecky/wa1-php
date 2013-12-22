<?php

class HomeController extends Controller {

	function index() {
		$this->template->title = 'Home page';
	}
}
