<?php
/* Advertisers Test cases generated on: 2012-06-07 19:28:49 : 1339097329*/
App::import('Controller', 'Checking.Advertisers');

class TestAdvertisersController extends AdvertisersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AdvertisersControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Advertisers =& new TestAdvertisersController();
		$this->Advertisers->constructClasses();
	}

	function endTest() {
		unset($this->Advertisers);
		ClassRegistry::flush();
	}

}
?>