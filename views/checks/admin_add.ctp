<script>
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
			var type = $("#CheckPublisherTypeId").val();
			updateEditors(type);
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
<?php echo $this->Form->create('Check');?>
	<fieldset>
	<?php
		echo $this->Form->input('advertiser_id');
		echo $this->Form->input('campaign_id');
		echo $this->Form->input('publish_date');
		echo $this->Form->input('expiration_date');
	?>
		<div id="jsonDiv">
	<?php
		echo $this->Form->input('Json.0.product');
		echo $this->Form->input('Json.0.price');
		echo $this->Form->input('Json.0.unit');
	?>
		<script>
		$(document).ready(function() {
			$('#jsonAdd').click(function(){
					productCount += 1;
					oldForm = $('#jsonDiv').html();
					oldForm += '<div id="json"><div class="input text"><label for="Json' + productCount + 'Product">Product</label><input type="text" id="Json' + productCount + 'Product" name="data[Json][' + productCount + '][product]"></div><div class="input text"><label for="Json' + productCount + 'Price">Price</label><input type="text" id="Json' + productCount + 'Price" name="data[Json][' + productCount + '][price]"></div><div class="input text"><label for="Json' + productCount + 'Unit">Unit</label><input type="text" id="Json' + productCount + 'Unit" name="data[Json][' + productCount + '][unit]"></div></div>';
					$('#jsonDiv').html(oldForm);
				}
			);
		});
		</script>
		</div>
	<?php
		echo $this->Html->link('', '', array('name' => 'jsonForm'));
		echo $this->Html->link(__('Add', true), '#jsonForm', array('id' => 'jsonAdd', 'class' => 'button'));
		echo $this->Form->input('resume', array('type'=>'hidden'));
		echo $this->Form->input('content', array('type'=>'hidden'));
		echo $this->Form->input('observation', array('type'=>'hidden'));
		echo $this->Form->input('created_by', array('type'=>'hidden'));
		echo $this->Form->input('modified_by', array('type'=>'hidden'));
		echo $this->Form->input('customer_id');
		echo $this->Form->input('publisher_type_id');
		echo $this->Form->input('publisher_id');
		echo $this->Form->input('section_id');
		echo $this->Form->input('params', array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div style="clear:both"></div>