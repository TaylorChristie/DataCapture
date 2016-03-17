<?php

namespace MineSQL;


class captureData 
{

	private $file;


	public function __construct($filename)
	{
		$this->file = $filename;
	}


	public function capture($validPHP = false)
	{
		$arrays = array('get' => $_GET, 'post' => $_POST, 'cookie' => $_COOKIE, 'server' => $_SERVER, 'env' => $_ENV);
		$text = "";
		foreach($arrays as $name => $array)
		{
			if($validPHP)
			{
				// Can be used with sendData.php file 

				$text .= '$'.$name.' = '.var_export($array, true).';'.PHP_EOL.PHP_EOL;

			} else {

			$text .= '------'.$name.'------'.PHP_EOL.PHP_EOL.print_r($array, true).PHP_EOL.PHP_EOL.'------end-'.$name.'-------'.PHP_EOL.PHP_EOL.PHP_EOL;

			}
		}

		$name = $this->file.'.'.time().'.txt'; 

		$file = fopen($name, 'w');
		fwrite($file, $text);
		fclose($file);

		return $name;
	}

}
