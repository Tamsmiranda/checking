<?php
/* Advertiser Test cases generated on: 2012-06-07 19:28:32 : 1339097312*/
App::import('Model', 'Checking.Advertiser');

class AdvertiserTestCase extends CakeTestCase {
	function startTest() {
		$this->Advertiser =& ClassRegistry::init('Advertiser');
	}

	function endTest() {
		unset($this->Advertiser);
		ClassRegistry::flush();
	}

}
?>