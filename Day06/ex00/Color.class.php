<?php

class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;
	
	function __construct(array $kwargs) {

		if (isset($kwargs['red']) && isset($kwargs['green']) && isset($kwargs['blue'])) {
			if ( array_key_exists('red', $kwargs) )
				$this->red = intval($kwargs['red']);
			else
				$this->red = 0;
			if ( array_key_exists('green', $kwargs) )
				$this->green = intval($kwargs['green']);
			else
				$this->green = 0;
			if ( array_key_exists('blue', $kwargs) )
				$this->blue = intval($kwargs['blue']);
			else
				$this->blue = 0;
		}
		
		else if (isset($kwargs['rgb'])) {
			$this->red = intval(($kwargs['rgb'] >> 16) & 255);
			$this->green = intval(($kwargs['rgb'] >> 8) & 255);
			$this->blue = intval($kwargs['rgb'] & 255);
		}
		
		if (self::$verbose) {
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		}
	}

	function __destruct() {

		if (self::$verbose) {
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		}
	}

	function __toString() {
		return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
	}

	static function doc() {
		return (file_get_contents('Color.doc.txt'));
	}

	function add($new_col) {
		return (new Color( array('red' => $this->red + $new_col->red,
			'green' => $this->green + $new_col->green,
			'blue' => $this->blue + $new_col->blue)));
	}
	
	function sub($new_col) {
		return (new Color( array('red' => $this->red - $new_col->red,
			'green' => $this->green - $new_col->green,
			'blue' => $this->blue - $new_col->blue)));
	}
	
	function mult($new_col) {
		return (new Color( array('red' => $new_col * $this->red,
			'green' => $new_col * $this->green,
			'blue' => $new_col * $this->blue)));
	}

}
?>
