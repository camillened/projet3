<?php

class ModeleAutoloader

{
	static function register()//évite les conflits
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	static function autoload($class_name) //static car pas besoin d'instancier la classe (cf cours grafikart)
	{
	  require 'Modele/'.$class_name.'.php';
	}

}