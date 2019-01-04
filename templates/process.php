<?php 
// if(sizeof($currentProcess) != 0)
$p = $currentProcess ;
?>

<div class="process" style='background: <?=$p['background']?>'>
	<div class="process_image_cont">
		<img src="<?=$p['image']?>">
	</div>
	<div class="process_title">
		<?=$p['title']?>
	</div>
	<div class="process_description">
		<?=$p['description']?>
	</div>	
	<div class="process_read_more">
		<span>Read More</span>
	</div>
</div>