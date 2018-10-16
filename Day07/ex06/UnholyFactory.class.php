<?php

class UnholyFactory {
	
	private $_abs = array();
	
	public function absorb($inst) {
		if ($inst instanceof Fighter) {
			$id = $inst->str;
			if (!$this->_abs[$id]) {
				$this->_abs[$id] = $inst;
				print ('(Factory absorbed a fighter of type '.$id.')'.PHP_EOL);
			}
			else {
				print ('(Factory already absorbed a fighter of type '.$id.')'.PHP_EOL);
			}
		}
		else
			print ('(Factory can\'t absorb this, it\'s not a fighter)'.PHP_EOL);
	}
	
	public function fabricate($str) {
		if ($this->_abs[$str]) {
			print('(Factory fabricates a fighter of type '.$str.')'.PHP_EOL);
			return ($this->_abs[$str]);
		}
		else {
			print('(Factory hasn\'t absorbed any fighter of type '.$str.')'.PHP_EOL);
			return (null);
		}
	}
}
?>
