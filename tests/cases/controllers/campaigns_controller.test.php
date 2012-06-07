<?php
/* Campaigns Test cases generated on: 2012-06-07 20:17:58 : 1339100278*/
App::import('Controller', 'Checking.Campaigns');

class TestCampaignsController extends CampaignsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CampaignsControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Campaigns =& new TestCampaignsController();
		$this->Campaigns->constructClasses();
	}

	function endTest() {
		unset($this->Campaigns);
		ClassRegistry::flush();
	}

}
?>