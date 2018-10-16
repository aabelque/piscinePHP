<?php

class NightsWatch {

	private $_fighter;

	function recruit($arg) {
		if ($arg instanceof IFighter)
			$this->_fighter[] = $arg;
	}

	function fight() {
		foreach ($this->_fighter as $elem)
			$elem->fight();
	}
}

?>
