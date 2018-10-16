<?php

class Lannister {

	public function sleepWith($person) {

		if ($person instanceof Lannister)
			 print("Not even if I'm drunk !".PHP_EOL);
		else
			print("Let's do this.".PHP_EOL);
	}
}
?>
