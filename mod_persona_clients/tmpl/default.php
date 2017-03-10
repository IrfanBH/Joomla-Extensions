<?php
defined('_JEXEC') or die;
?>
<!-- Title -->
<div class="row padded-top">
	<div class="col-xs-12 col-lg-8 col-lg-offset-2">
		<h2><?php echo $module->title;?></h2>
	</div>
</div>

<!-- Large Text -->
<div class="row">
	<div class="col-xs-12 col-lg-8 col-lg-offset-2">
		<h1><?php echo $params->get("heading");?></h1>
		<p><?php echo $params->get("sub_heading");?></p>
	</div>
</div>

<!-- Logos -->
<div class="row">
	<div class="col-xs-12 col-lg-8 col-lg-offset-2">
	<?php foreach ($objects as $key => $value) {?>
		<a class="client" href="#"><img class="has-retina" src="<?php echo JURI::base().$value['logo'];?>" alt="<?php echo JURI::base().$value['name'];?>"></a>
	<?php }?>
	</div>
</div>