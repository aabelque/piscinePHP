<?php

class Vertex {

	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1.0;
	private $_color;
	public static $verbose = FALSE;

	function getX() { return ($this->_x); }
	function getY() { return ($this->_y); }
	function getZ() { return ($this->_z); }
	function getW() { return ($this->_w); }
	function getCOLOR() { return ($this->_color); }

	function setX($x) { $this->_x = $x; }
	function setY($y) { $this->_y = $y; }
	function setZ($z) { $this->_z = $z; }
	function setW($w) { $this->_w = $w; }
	function setCOLOR($color) { $this->_color = $color; }

	function __get($att) {
		print("Attempt to access '".$att."' attribute, this script should die".PHP_EOL);
		return ("Error");
	}

	function __set($att, $value) {
		print("Attempt to set '".$att."' attribute to '".$value."', this script should die".PHP_EOL);
	}

	function __construct(array $kwargs) {

		if (isset($kwargs['x']) && isset($kwargs['y']) && isset($kwargs['z'])) {
			$this->_x = $kwargs['x'];
			$this->_y = $kwargs['y'];
			$this->_z = $kwargs['z'];
		}
		if (isset($kwargs['color']) && $kwargs['color'] instanceof Color) 
			$this->_color = $kwargs['color'];
		else
			$this->_color =  new Color( array('red' => 255, 'green' => 255, 'blue' => 255) );
		if ( array_key_exists('w', $kwargs) )
			$this->_w = $kwargs['w'];
		else
			$this->_w = 1.0;
		if (self::$verbose) {
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}
	}

	function __destruct() {
		if (self::$verbose) {
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}
	}

	function __toString() {
		if (self::$verbose)
			return (vsprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue)));
		else
			return (vsprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
	}

	static function doc() {
		return (file_get_contents('Vertex.doc.txt'));
	}
}

?>
