<?php echo form::open(); ?>
	<input type="hidden" name="csrf" value="<?=forum_csrf::token()?>" />
	<label>Are You Sure?</label>
	<button name="confirm" value="confirm">Confirm</button>
	<button name="cancel" value="cancel">Cancel</button>
<?php echo form::close(); ?>