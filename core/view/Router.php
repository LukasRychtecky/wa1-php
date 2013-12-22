<?php

class Router {

	protected $request;
	protected $ctrlNameDefault = null;
	protected $actionDefault = null;
	protected $loader;

	function __construct(Request $request, ClassLoader $loader, $ctrlNameDefault = 'Index', $actionDefault = 'index') {
		$this->request = $request;
		$this->actionDefault = $actionDefault;
		$this->ctrlNameDefault = $ctrlNameDefault;
		$this->loader = $loader;
	}

	function route(RouterParams $params) {
		$ctrlName = $params->getCtrlName();
		if (empty($ctrlName)) {
			$ctrlName = $this->ctrlNameDefault;
		}

		$action = $params->getAction();
		if (empty($action)) {
			$action = $this->actionDefault;
		}

		$ctrlName = ucfirst($ctrlName) . 'Controller';

		if ($this->loader->classExists($ctrlName)) {

			$ref = new ReflectionClass($ctrlName);
			$ctrl = new $ctrlName($this->request, dirname($ref->getFileName()));

			if (method_exists($ctrl, $action)) {

				$ctrl->$action($params->getId());
				$ctrl->send("$action.tpl");
				return;
			}
		}

		$this->notFound();
	}

	protected function notFound() {
		$ctrl = new NotFoundController($this->request);
		$ctrl->render();
	}
}
