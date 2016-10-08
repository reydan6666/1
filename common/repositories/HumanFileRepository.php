<?php
namespace common\repositories;

use common\models\Human;

class HumanFileRepository
{
	private $fileName;

	/**
	 * HumanFileRepository constructor.
	 *
	 * @param string $fileName
	 */
	public function __construct($fileName)
	{
		$this->fileName = $fileName;
	}

	/**
	 * @param Human[] $humans
	 */
	public function save($humans)
	{
		$fileCoontent = null;
		foreach ($humans as $human){
			$humanString = $human->serialize();

			if($fileCoontent === null) {
				$fileCoontent = '';
			}
			else {
				$fileCoontent .= "\n";
			}

			$fileCoontent .= $humanString;
		}

		file_put_contents($this->fileName, $fileCoontent);
	}
}