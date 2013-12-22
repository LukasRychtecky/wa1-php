<?php
class QueryBuilder {

	function buildSelect($model) {
		return "SELECT * FROM {$model::$table}";
	}

	function buildInsert($model, $attrs) {
		$query = "INSERT INTO `{$model::$table}` SET ";
		foreach ($attrs as $k => $v) {
			$query .= "`$k` = '$v', ";
		}
		return substr($query, 0, -2) . ';';
	}
}
