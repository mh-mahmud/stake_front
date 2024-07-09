<?php
    $notice_data = $this->db->query("SELECT * FROM notice WHERE status=1")->result();
?>
<?php if (!empty($notice_data)): ?>
	<div class="notice-bar-area">
	    <div class="notice-text">News</div>
	            <?php foreach($notice_data as $nval) : ?>
		<marquee behavior = 'scroll' direction = 'left' onmouseout=this.start(); onmouseover=this.stop(); scrollamount='2' scrolldelay='40' truespeed='truespeed'>
				<?php echo $nval->description; ?>
		</marquee>
	            <?php endforeach; ?>
	</div>
<?php endif ?>

