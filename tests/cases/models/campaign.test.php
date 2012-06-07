<?php
/* Campaign Test cases generated on: 2012-06-07 20:17:37 : 1339100257*/
App::import('Model', 'Checking.Campaign');

class CampaignTestCase extends CakeTestCase {
	function startTest() {
		$this->Campaign =& ClassRegistry::init('Campaign');
	}

	function endTest() {
		unset($this->Campaign);
		ClassRegistry::flush();
	}

}
?>