<?php
	class PreviewHelper extends AppHelper {
	
		var $helpers = array('Html');

		function size($file, $width = null, $height = null ) {
			if ($file) {
				$fileinfo = pathinfo($file);
				$extension = $fileinfo['extension'];
				?>
				<?php switch($extension): 
					case 'png':
					case 'gif':
					case 'jpeg':
					case 'jpg':
						$params = $width ? '&w=' . $width : '';
						$params .= $height ? '&h=' . $height : '';
						$params .= '&zc=1'
					?>
						<div class = "preview image">
								<a href="<?php echo $this->webroot . 'timthumb.php?src=' . $file; ?>"><img src="<?php echo $this->webroot . 'timthumb.php?src=' . $file . $params; ?>" alt="Player" /></a>
						</div>
					<?php break;?>
				<?php 
					case 'wmv': 
						$width = $width < 30 ? 30 : $width;
						$height = $height < 30 ? 30 : $height;
					?>
						<div class = "preview image">
							<object width="<?php echo $width; ?>" height="<?php echo $height; ?>" type="application/x-oleobject" standby="Loading Windows Media Player components..." classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95" id="MediaPlayer">
								<param value="<?php echo $file; ?>" name="FileName">
								<param value="false" name="autostart">
								<param value="true" name="ShowControls">
								<param value="false" name="ShowStatusBar">
								<param value="false" name="ShowDisplay">
								<embed width="<?php echo $width; ?>" height="<?php echo $height; ?>" autostart="0" showdisplay="0" showstatusbar="0" showcontrols="1" name="MediaPlayer" src="<?php echo $file; ?>" type="application/x-mplayer2"> 
							</object>
						</div>
				<?php break;?>
				<?php 
					case 'flv':
					case 'mpeg':
					?>
						<a class="player" href="<?php echo $file; ?>">
							<img src="<?php echo $this->webroot . 'img/flow_eye.jpg';?>" alt="Player" />
						</a>
						<script src="<?php echo $this->webroot;?>js/flowplayer-3.2.6.min.js"></script>
						<script>
							flowplayer("a.player", "<?php echo $this->webroot;?>swf/flowplayer-3.2.7.swf");
						</script>
				<?php break;?>
				<?php endswitch;?>
			<?php

			} 
		}
		
	}
?>