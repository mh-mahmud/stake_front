<div class="eHVyQw">
	<?php foreach($get_data as $val) : ?>

		<?php if($val->from_msg) : ?>
			<div class="DialogItem-sc-17pmpaf-0 bkKUcj chat-msg">
			    <div class="Text-sc-17pmpaf-1 kSbkGY"><?php echo $val->from_msg; ?></div>
			    <div class="DataTime-sc-17pmpaf-2 jcrjIw"><?php echo date("H:i", strtotime($val->created_at)); ?></div>
			    <?php //echo date("jS M H:i", strtotime($val->created_at)); ?>
			</div>
		<?php endif; ?>

		<?php if($val->to_msg) : ?>
			<div class="DialogItem-sc-17pmpaf-0 epDmqZ reply-msg">
			    <div class="Text-sc-17pmpaf-1 kSbkGY"><?php echo $val->to_msg; ?></div>
			    <div class="DataTime-sc-17pmpaf-2 jcrjIw"><?php echo date("H:i", strtotime($val->created_at)); ?></div>
			</div>
		<?php endif; ?>

	<?php endforeach; ?>
</div>