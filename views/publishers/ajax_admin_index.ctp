<option value=""><?php __('Select');?></option>
<?php foreach ($publishers as $publisher) : ?>
<option value="<?php echo $publisher['Publisher']['id'];?>"><?php echo $publisher['Publisher']['name'];?></option>
<?php endforeach;?>