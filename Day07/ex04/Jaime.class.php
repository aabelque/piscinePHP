<?php

class Jaime extends Lannister {

	public function sleepWith ($person) {
		if (!($person instanceof Cersei))
			parent::sleepWith($person);
		else
			print("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
	}
}
?>
