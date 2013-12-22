<?php

class NotFoundController extends Controller {

	function render() {
		$this->responseCode(404);
		echo "Page not found";
	}
}
