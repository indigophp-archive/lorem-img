<?php


class Image_Text extends \Fuel\Core\Image_Gd 
{
	/**
	 * Megadott fonttal kiír valamit a kép közepére
	 * @param  string $string A kiírandó szöveg
	 * @param  string $font   A használandó font elérési útja
	 * @param  float  $size   Fontméret. GD1-ben pixel, GD2-ben pont.
	 * @return Image_Text     Láncolhatóságért az osztály önmaga
	 */
	public function print_to_center( $string, $font, $size) {
		try {
			$bounds = imagettfbbox($size, 0, $font, $string);

			$black = imagecolorallocate($this->image_data, 0, 0, 0);
			$white = imagecolorallocate($this->image_data, 255, 255, 255);

			$w = $bounds[4] - $bounds[6];
			$h = $bounds[1] - $bounds[7];

			$x = $bounds[0] + (imagesx($this->image_data) / 2) - ($bounds[4] / 2) - 25;
			$y = $bounds[1] + (imagesy($this->image_data) / 2) - ($bounds[5] / 2) - 5;
			
			imagettftext($this->image_data, $size, 0, $x, $y+3, $black, $font, $string);
			imagettftext($this->image_data, $size, 0, $x, $y,   $white, $font, $string);

		} catch (Exception $e) {
			echo $e->getMessage();
			var_dump($x, $y, $bounds);
		}
		return $this;
	}
}