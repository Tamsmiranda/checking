<?php
/* Check Test cases generated on: 2012-06-07 18:09:35 : 1339092575*/
App::import('Model', 'Checking.Check');

class CheckTestCase extends CakeTestCase {
	function startTest() {
		$this->Check =& ClassRegistry::init('Check');
	}

	function endTest() {
		unset($this->Check);
		ClassRegistry::flush();
	}

}
?>