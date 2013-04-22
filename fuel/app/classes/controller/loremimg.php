<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Loremimg extends Controller
{

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		try {
			// Paraméterek beszedése az URL-ből
			$params = array_filter(explode('/', Input::uri()));

			// Méretek ellenőrzése, ha értelmetlen, akkor 404
			list ($width, $height) = explode('x', array_shift($params));
			if (!is_numeric($width) || !is_numeric($height)) {
				throw new HttpNotFoundException;
			}

			// Szöveg meghatározása
			$text = isset($params[0]) ? $params[0] : $width . 'x' . $height;

			// Random kép kiválasztása
			$dir = APPPATH . 'views/images/';
			$images = array_slice(scandir($dir), 2);
			$path = $images[array_rand($images)];

			// Képmanipuláció
			$i = Image::load($dir . $path);
			$i->crop_resize($width, $height);

			// if(true) {
			if(rand(1,999) == 500 || isset($_GET['toasty'])) {
				$i->watermark(APPPATH . 'views/toasty.png', 'bottom right', -10);
				$text = "TOASTY!";
			}
			$i->print_to_center($text, APPPATH . 'views/font.ttf', 100);

			$i->output();

		// Akármilyen hiba esetén 404
		} catch (Exception $e) {
			die( $e->getMessage() );
			throw new HttpNotFoundException;
		}
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}
}
