<?php

namespace common\tests\unit\repositories;

use common\models\Human;
use common\repositories\HumanFileRepository;

class HumanFileRepositoryTest extends \Codeception\Test\Unit
{
    public function testSave()
    {
    	/**
	     * @var Human|\PHPUnit_Framework_MockObject_MockObject $human
	     */
	    $human = $this->createMock(Human::class);
	    $human->method('serialize')->willReturn('Иванов:Москва');

	    $humans = [$human];
	    $fileName = YII_APP_BASE_PATH . '1.txt';
//	    $fileName = 'C:\develop\domains\1.txt';

	    $repository = new HumanFileRepository($fileName);
	    $repository->save($humans);

	    $this->assertFileExists($fileName);
	    $fileContent = file_get_contents($fileName);
	    $this->assertEquals($human->serialize(), $fileContent);
	}


}
