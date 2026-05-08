<?php
global $post;

	if (have_comments()){	
?>
	<h2 class="comments-heading"><?php comments_number('0', '1', '%'); echo ' '.esc_html__('Comments','waxom').':'; ?></h2>
	<div id="comments" class="single-blog-post-comments">
		
		<ul class="comments">
		<?php 
		wp_list_comments('type=comment&callback=waxom_comment');				
		?>				
		</ul>
		<div class="pagination"><div class="pagination-inner">
		<?php 
		paginate_comments_links(array(
			'prev_text' => '',
			'next_text' => ''
		)); 
		?>
		</div></div>	
	
	</div>		
	
	<?php } // Comments list end ?>		
	
	<div id="respond">
		
		<h2 class="comments-heading"><?php echo esc_html__('Leave reply','waxom').':'; ?></h2>
		
		<div class="post-respond-holder post-form clearfix">
			
		<?php 
		
		$args = array(
			 'title_reply'	=> '',
			 'comment_field' =>  '<div class="comment-form-comment col-xs-12"><label>'.esc_html__('Your Message','waxom').' *</label><textarea name="comment" id="comment" placeholder="'.esc_html__('Your comment','waxom').'..." class="form textarea light-form" aria-required="true"></textarea></div>',
			 'fields' => apply_filters( 'comment_form_default_fields', array(
			 
			 	'author' 	=> '<div class="col-xs-6 comment-form-author"><label>'.esc_html__('Your Name','waxom').' *</label><input id="author" name="author" placeholder="'.esc_html__('Your Name','waxom').'" type="text" required="required" class="form light-form"/></div>',
			 	'email' 	=> '<div class="col-xs-6 comment-form-email"><label>'.esc_html__('Your E-Mail','waxom').' *</label><input id="email" name="email" type="email" placeholder="'.esc_html__('Email','waxom').'" required="required" class="form light-form"/></div>',
			   )),
		);
					
		comment_form($args); 		
		
		?>			   

		</div>
	</div>