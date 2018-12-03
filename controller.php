<?php
class Billet
{
	private $_id;
	private $_date;
	private $_title;
	private $_content = 50;

	public function getView()
	{
		echo $this->_content;
	}



}

$bil = new Billet;
$bil->getView();


require('modele.php'); ?>
