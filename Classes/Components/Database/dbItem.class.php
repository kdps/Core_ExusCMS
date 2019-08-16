<?php

class dbItem {
	
	function __construct($std, $sth) {
		$this->sth = $sth;
		if (!is_array($std)) {
			$this->result = $std;
		} else {
			if (count($std) < 1) {
				$this->result = array_shift($std);
			} else {
				$this->result = $std;
			}
		}
	}
	
	function columnCount() {
		return $this->sth->columnCount();
	}
	
	function rowCount() {
		return $this->sth->rowCount();
	}
	
	function column($column) {
		$data = $this->data();
		
		if (is_array($data)) {
			return array_column($data, $column);
		}
	}
	
	function getQueryString() {
		return $this->sth['queryString'];
	}
	
	function data($row = null) {
		if ($row == null) {
			return $this->result;
		} else {
			return $this->result[$row];
		}
	
	}
	
}