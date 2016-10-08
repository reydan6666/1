<?php

namespace common\tests\unit\models;

use common\models\Human;

class HumanTest extends \Codeception\Test\Unit
{
    public function testFio()
    {
		$human = new Human();

	    $human->setFio('Иванов');

	    $this->assertEquals('Иванов', $human->getFio());
    }

	public function testAddress()
	{
		$human = new Human();

		$human->setAddress('Москва');

		$this->assertEquals('Москва', $human->getAddress());
	}

	public function testFormatForSave()
	{
		$human = new Human();

		$human->setFio('Иванов')->setAddress('Москва');

		$this->assertEquals('Иванов:Москва',$human->serialize());
	}

	public function testParsingSavedDate()
	{
		$str = 'Иванов:Москва';

		$human = new Human($str);

		$this->assertEquals('Иванов', $human->getFio());
		$this->assertEquals('Москва', $human->getAddress());
	}


}
