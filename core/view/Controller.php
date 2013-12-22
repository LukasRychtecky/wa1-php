<?php

class Controller {

	protected $template;
	protected $templatesDir;
	protected $request;
	protected $configFile;
	protected $client;

	function __construct(Request $request, $templatesDir = __DIR__) {
		$this->templatesDir = $templatesDir;
		$this->configFile = __DIR__ . '/../../configs/config.ini';
		$this->template = new Template(new MySmarty());
		$this->template->title = '';
		$this->request = $request;

		$pool = new ClientPool(parse_ini_file($this->configFile));
		$this->client = $pool->pull(basename($this->templatesDir));
	}

	function send($templateFile) {
		$this->template->getSmarty()->template_dir = "{$this->templatesDir}/templates";
		$this->template->display($templateFile, null, $this->uniqueTemplateName($templateFile));
	}

	private function uniqueTemplateName($templateFile) {
		$unique = md5("{$this->templatesDir}/templates/{$templateFile}");
		return "$unique-{$templateFile}";
	}

	function responseCode($code) {
		http_response_code($code);
	}
}
