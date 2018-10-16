<?php

abstract class Fighter {
	
	public function __construct($arg) {
		$this->str = $arg;
		return;
	}
	abstract public function fight($target);

}
?>
