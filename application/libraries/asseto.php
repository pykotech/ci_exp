<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Asseto {
	var $base;
	public function __construct() {
		//create an instance of the CodeIgnite Object
		$CI =& get_instance(); 
		$CI->load->helper('url');
		if(function_exists('base_url')) {	
			$this->base = base_url();
		} else if($CI->config->item('base_url')) {  
			$CI->config->load('asseto');
			$this->base = $CI->config->item('base_url');
		} else {
			exit('Asseto wont load base_url. Either 1) Add the config file included to config or 2)  load the URL helper  ');
		}
	}

	public function loadCSS($css) {
		return "<link rel=\"stylesheet\" type=\"text/css\" href=\"". $this->base . "assets/css/" . $css . ".css\">";
	}

	public function loadJS($js) {
		return "<script src=\"". $this->base . "assets/js/" . $js .".js\"></script>" ;
	}
	//all your base are belong to us :)
}
/*Filename : Asseto.php 
Location: Application\libraries\Asseto.php */
