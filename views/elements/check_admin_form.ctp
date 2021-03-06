﻿<script>
	function updateEditors(type) {
		// Impresso
		if (type == '4e64fc9f-9c14-4d75-9f7b-1260737253ea') {
			$('#obs').show('slow');
			$('#obs_lbl').text('Páginas');
			$('#divTiragem').show('slow');
			$('#divColumn').show('slow');
		} else if (type == '4e64fcca-5014-4d13-b2fb-1260737253ea') {
		// Tv
			$('#obs').show('slow');
			$('#obs_lbl').text('Duração');
		} else {
			$('#obs').hide('slow');
			$('#divTiragem').hide('slow');
			$('#divColumn').hide('slow');
		}
		$.ajax({
			type:'POST',
			url: '<?php echo $this->Html->url('/admin/checking/publishers/index/');?>' + type,
			success: function(data) {
			$("#CheckPublisherId").empty().append(data);
			updateSections($("#CheckSectionId").val());
			}
		});
	}
	
	function updateSections(publisher) {
		$.ajax({
			type:'POST',
			url: '<?php echo $this->Html->url('/admin/checking/sections/index/');?>' + publisher,
			success: function(data) {
			$("#CheckSectionId").empty().append(data);
			}
		});
	}
	
	function updateCampaigns(advertiser) {
		$.ajax({
			type:'POST',
			url: '<?php echo $this->Html->url('/admin/checking/campaigns/index/');?>' + advertiser,
			success: function(data) {
			$("#CheckCampaignId").empty().append(data);
			}
		});
	}
	
	$(document).ready(function() {
			$("#CheckPublisherTypeId").bind('change',
				function() {
					var type = $(this).val();
					updateEditors(type);
			});
			
			$("#CheckPublisherId").bind('change',
				function() {
					var publisher = $(this).val();
					updateSections(publisher);
			});
			
			$("#CheckAdvertiserId").bind('change',
				function() {
					var advertiser = $(this).val();
					updateCampaigns(advertiser);
			});
			
			//var type = $("#CheckPublisherTypeId").val();
			//updateEditors(type);
			//var advertiser = $("#CheckAdvertiserId").val();
			//updateCampaigns(advertiser)
	});
	// Json form
	productCount = 0;
</script>
<div class="checks form">
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Checks', true), array('action' => 'index'));?></li>
	</ul>
</div>
<?php echo $this->Form->create('Check', array('type' => 'file'));?>
	<fieldset>
	<?php
		echo $this->Form->input('advertiser_id', array('empty'=>__('Select', true)));
		echo $this->Form->input('campaign_id', array('empty'=>__('Select', true)));
		echo $this->Form->input('publish_date', array('dateFormat' => 'DMY', 'timeFormat' => '24'));
		echo $this->Form->input('expiration_date', array('dateFormat' => 'DMY', 'timeFormat' => '24'));
		echo $this->Form->input('location', array('empty'=>__('Select', true)));
	?>
	<div id="mainJson">
		<label for="CheckProducts"><?php echo __('Products', true);?></label>
		<div id="jsonDiv">
	<?php
		$units = array('kg' => 'kg', 'gr' => 'gr', 'lt' => 'lt', 'ml' => 'ml', 'uni' => 'uni', 'mt' => 'mt');
		if (isset($this->data)) {
			if (isset($this->data['Json'])) {
				$elementCount = 0;
				foreach ($this->data['Json'] as $json ) {
					echo $this->Form->input('Json.' . $elementCount . '.product',array('label' => false,'div' => false,'placeholder' => __('Product', true)));
					echo $this->Form->input('Json.' . $elementCount . '.price', array('label' => false,'div' => false,'placeholder' => __('Price', true)));
					echo $this->Form->input('Json.' . $elementCount . '.quantity', array('label' => false,'div' => false,'placeholder' => __('Quantity', true)));
					echo $this->Form->select('Json.' . $elementCount . '.unity', $units);
					$elementCount += 1;
				}
			}
		} else {
			echo $this->Form->input('Json.0.product', array('label' => false,'div' => false,'placeholder' => __('Product', true)));
			echo $this->Form->input('Json.0.price', array('label' => false,'div' => false,'placeholder' => __('Price', true)));
			echo $this->Form->input('Json.0.quantity', array('label' => false,'div' => false,'placeholder' => __('Quantity', true)));
			echo $this->Form->select('Json.0.unity', $units);
		}
	?>
		<script>
		$(document).ready(function() {
			$('#jsonAdd').click(function(){
					productCount += 1;
					var newElement = 'jsonDiv' + productCount;
					var formElements = $('#jsonDiv').clone()
						.attr('id', newElement);
					$('#jsonDiv').first().after(formElements);
					$('#' + newElement + ' [for="Json0Product"]').attr('for','Json' + productCount + 'Product');
					$('#' + newElement + ' #Json0Product')
						.attr('id','Json' + productCount + 'Product')
						.attr('name', 'data[Json][' + productCount + '][product]')
						.attr('value', '');
					$('#' + newElement + ' [for="Json0Price"]').attr('for','Json' + productCount + 'Price');
					$('#' + newElement + ' #Json0Price')
						.attr('id','Json' + productCount + 'Price')
						.attr('name', 'data[Json][' + productCount + '][price]')
						.attr('value', '');
					$('#' + newElement + ' [for="Json0Quantity"]').attr('for','Json' + productCount + 'Quantity');
					$('#' + newElement + ' #Json0Quantity')
						.attr('id','Json' + productCount + 'Quantity')
						.attr('name', 'data[Json][' + productCount + '][quantity]')
						.attr('value', '');
					$('#' + newElement + ' #Json0Unity')
						.attr('id','Json' + productCount + 'Unity')
						.attr('name', 'data[Json][' + productCount + '][unity]')
						.attr('value', '');
				}
			);
		});
		</script>
		</div>
		</div>
	<?php
		echo $this->Html->link('', '', array('name' => 'jsonForm'));
		echo $this->Form->button(__('Add', true),array('id' => 'jsonAdd', 'type' => 'button'));
		echo $this->Form->input('id',array('type'=>'hidden'));
		echo $this->Form->input('resume', array('type'=>'hidden'));
		echo $this->Form->input('content', array('type'=>'hidden'));
		echo $this->Form->input('observation', array('type'=>'hidden'));
		echo $this->Form->input('created_by', array('type'=>'hidden'));
		echo $this->Form->input('modified_by', array('type'=>'hidden'));
		echo $this->Form->input('customer_id', array('empty'=>__('Select', true)));
		echo $this->Form->input('publisher_type_id', array('empty'=>__('Select', true)));
		echo $this->Form->input('publisher_id', array('empty'=>__('Select', true)));
		echo $this->Form->input('section_id', array('empty'=>__('Select', true)));
		echo $this->Form->input('params', array('type'=>'hidden'));
		// Arquivo
		if ($this->data['Check']['file']) {
			//Adicionar preview
			//echo $this->Html->image($this->Html->url('/',true) . 'files/advertisers/logos/' . $this->data['Advertiser']['logo']);
		}
		echo $this->Form->input('lenght', array('label' => 'Duração'));
		echo $this->Form->input('file', array('type' => 'file'));
		echo $this->Form->input('dir', array('type' => 'hidden'));
		echo $this->Form->input('mimetype', array('type' => 'hidden'));
		echo $this->Form->input('filesize', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>