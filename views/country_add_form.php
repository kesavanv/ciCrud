<?php include('header.php'); ?>
<h2>Add a Country to the list</h2>

<?php //echo validation_errors(); ?>

<?php echo form_open('country/add_new') ?>
	<? echo form_hidden('id',$id['value']); ?>
<p <?php if(form_error('name') != '') echo 'class="error"'; ?>>
	<label for="name">Country name</label>
	<?php echo form_input('name', set_value('name', $name['value'])); ?>
	<?php echo form_error('name', '<span class="error">', '</span>'); ?>
</p>
<p <?php if(form_error('country_code') != '') echo 'class="error"'; ?>>
	<label for="country_code">Country code </label> 
	<?php echo form_input('country_code', set_value('country_code', $country_code['value'])); ?>
	<?php echo form_error('country_code', '<span class="error">', '</span>'); ?>
</p>
<p <?php if(form_error('currency') != '') echo 'class="error"'; ?>>
	<label for="currency">Currency </label> 
	<?php echo form_input('currency', set_value('currency', $currency['value'])); ?>
	<?php echo form_error('currency', '<span class="error">', '</span>'); ?>
</p>
<p <?php if(form_error('currency_code') != '') echo 'class="error"'; ?>>
	<label for="currency_code">Currency code</label> 
	<?php echo form_input('currency_code', set_value('currency_code', $currency_code['value'])); ?>
	<?php echo form_error('currency_code', '<span class="error">', '</span>'); ?>
</p>
<p>
	<input type="submit" name="submit" value="Submit" /> 
	<a href=<?php echo '"'.base_url().'index.php/country"' ?>>Cancel</a>
</p>

</form>

<?php include("footer.php"); ?>