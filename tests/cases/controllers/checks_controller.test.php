<?php
/* Checks Test cases generated on: 2012-06-07 18:10:19 : 1339092619*/
App::import('Controller', 'Checking.Checks');

class TestChecksController extends ChecksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ChecksControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Checks =& new TestChecksController();
		$this->Checks->constructClasses();
	}

	function endTest() {
		unset($this->Checks);
		ClassRegistry::flush();
	}

}
?>