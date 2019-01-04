<?php 
$f = $currentFeature ;


?>
<div class="feature" style='background: <?=$f['background']?>'>
	<div class="feature_opaquer"></div>
	<div class="feature_icon_cont">
		<div class="feature_icon">
			<i class = "<?=$f['icon']?> fIcon"></i>
		</div>
	</div>
	<div class="feature_title">
		<?=$f['title']?>
	</div>
	<div class="feature_description">
		<?=$f['description']?>
	</div>
</div>