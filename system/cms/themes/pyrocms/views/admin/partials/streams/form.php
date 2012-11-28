<?php echo form_open_multipart(uri_string(), 'class="streams_form"'); ?>

<div class="form_inputs">

	<ul>

	<?php foreach( $fields as $field ) { ?>

		<li>
			<label for="<?php echo $field['input_slug'];?>"><?php echo $this->fields->translate_label($field['input_title']);?> <?php echo $field['required'];?>
			
			<?php if( $field['instructions'] != '' ): ?>
				<br /><small><?php echo $field['instructions']; ?></small>
			<?php endif; ?>
			</label>
			<div id="input_<?php echo $field['input_slug'];?>">
			<div class="input"><?php echo $field['input']; 
			     	if( (strpos($field['input'], "file")>0) && (strpos($field['input'], "img")>0) )
			{
				echo "<button id='del_button_".$field['input_slug']."' type='button' onclick=\"delImg('".$field['input_slug']."'); return false;\" >Delete</button>";
			}
				
			?>
				</div>
			</div>
		</li>

	<?php } ?>
	
	</ul>	

</div>

	<?php if ($mode == 'edit'){ ?><input type="hidden" value="<?php echo $entry->id;?>" name="row_edit_id" /><?php } ?>

	<div class="float-right buttons">
		<button type="submit" name="btnAction" value="save" class="btn blue"><span><?php echo lang('buttons.save'); ?></span></button>	
		<a href="<?php echo site_url(isset($return) ? $return : 'admin/streams/entries/index/'.$stream->id); ?>" class="btn gray"><?php echo lang('buttons.cancel'); ?></a>
	</div>


<script>
 function delImg(slug){
	$("input[name="+slug+"]").val("-1");
	$("#input_"+slug).find('.input').find('img').remove();
	$("#del_button_"+slug).remove();
}
</script>


<?php echo form_close();?>