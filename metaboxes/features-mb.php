<?php while( $mb->have_fields_and_multi( 'features' ) ): ?>
<?php $mb->the_group_open(); ?>

		<?php
		$mb->the_field('benefit');
		$mb_content = html_entity_decode($mb->get_the_value(), ENT_QUOTES, 'UTF-8');
		$mb_editor_id = sanitize_key($mb->get_the_name());
		$mb_settings = array('textarea_name'=>$mb->get_the_name(),'textarea_rows' => '5');
		wp_editor( $mb_content, $mb_editor_id, $mb_settings );
		?>

		<a style="margin-bottom: 20px;" href="#" class="dodelete button">Delete Feature</a>

<?php $mb->the_group_close(); ?>
<?php endwhile; ?>


<p>
	<a href="#" class="docopy-features button">Add a New Feature</a> 
	<input type="submit" class="button-primary" name="save"value=" Save Features "/>
</p>


<textarea id="abctest" name="abctest"></textarea>