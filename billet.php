<?php

require('modele.php');

class Billet
{
	private $_billet_id;
	private $_billet_date;
	private $_billet_title;
	private $_billet_content;

	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) 
		{
			$method = 'set'.ucfirst($key);
		}
		if (method_exists($this, $method)) 
		{
			$this->$method($value);
		}
	}

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}


	// Liste des getters
	
	public function billet_id()
	{
		return $this->_billet_id;
	}

	public function billet_date()
	{
		return $this->_billet_date;
	}

	public function billet_title()
	{
		return $this->_billet_title;
	}

	public function billet_content()
	{
		return $this->_billet_content;
	}

	//liste des setters

	public function setBillet_Id($billet_id)
	{
		$this->$billet_id = (int) $billet_id;
	}

	public function setBillet_Date($billet_date)
	{
//à voir php note : 	public DateTime DateTime::setDate ( int $year , int $month , int $day )???
	} 


	public function setBillet_Title($billet_title)
	{
		if (is_string($billet_title) && strlen($billet_title)<=255)
		{
			$this->_billet_title = $billet_title;
		}
	}

	public function setBillet_Content($billet_content)
	{
		if (is_string($billet_content))
		{
			$this->_billet_content = $billet_content;
		}
	}

}
