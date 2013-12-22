<?php

class Record extends BaseModel {

	static $table = 'y36tw1_record';

	private $id;
	private $title;
	private $author;
	private $text;
	private $date;

	function __construct() {
		$this->setPk('id');
	}

	public function setAuthor($author) {
		$this->author = $author;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function setDate($date) {
		$this->date = $date;
	}

	public function getDate() {
		return $this->date;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function setText($text) {
		$this->text = $text;
	}

	public function getText() {
		return $this->text;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getTitle() {
		return $this->title;
	}

	function __toString() {
		return $this->title;
	}
}
