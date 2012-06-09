<option value=""><?php __('Select');?></option>
<?php foreach ($campaigns as $campaign) : ?>
<option value="<?php echo $campaign['Campaign']['id'];?>"><?php echo $campaign['Campaign']['name'];?></option>
<?php endforeach;?>