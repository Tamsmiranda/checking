<option value=""><?php __('Select');?></option>
<?php foreach ($sections as $section) : ?>
<option value="<?php echo $section['Section']['id'];?>"><?php echo $section['Section']['name'];?></option>
<?php endforeach;?>