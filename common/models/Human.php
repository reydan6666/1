<?php

namespace common\models;

class Human
{
	/**
	 * @var string
	 */
	private $fio;

	/**
	 * @var string
	 */
	private $address;

	/**
	 * @return mixed
	 */
	public function getFio()
	{
		return $this->fio;
	}

	/**
	 * @param string $fio
	 * @return $this
	 */
	public function setFio($fio)
	{
		$this->fio = $fio;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * @param string $address
	 *
	 * @return $this
	 */
	public function setAddress($address)
	{
		$this->address = $address;
		return $this;
	}

	/**
	 * @return string
	 */
	public function serialize()
	{
		return $this->fio . ':' . $this->address;
	}

	/**
	 * Human constructor.
	 *
	 * @param null $string
	 */
	public function __construct($string = null)
	{
		if($string !== null){
			$this->parseString($string);
		}
	}

	/**
	 * @param $string
	 */
	private function parseString($string)
	{
		list($this->fio, $this->address) = explode(':', $string);
	}
}