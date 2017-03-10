<?php
defined('_JEXEC') or die;
?>
<!-- Title -->
<div class="row">
	<div class="col-xs-12 col-lg-8 col-lg-offset-2">
		<h2><?php echo $module->title;?></h2>
	</div>
</div>

<!-- Timeline -->
<div class="row">
	<div class="timeline col-xs-12 col-lg-8 col-lg-offset-2">
	<?php foreach ($objects as $key => $value) {?>
		<div class="entry">
			<div class="time <?php echo($key==0)?'on':'';?>"><?php echo date('M Y',strtotime($value['from_date']));?> - <?php echo($value['to_date']=='0000-00-00')?JText::_('Present'):date('M Y',strtotime($value['to_date']));?></div>
			<div class="content"><span class="strong"><?php echo $value['organization'];?></span><br><?php echo $value['designation'];?></div>
		</div>
	<?php };?>
	</div>
</div>

<!-- Button -->
<div class="row padded-top">
	<div class="col-xs-12 col-lg-8 col-lg-offset-2">
		<a class="button" href="<?php echo JURI::base()?>media/com_persona_experience/<?php echo $params->get('upload_resume');?>"><?php echo $params->get('button_title');?></a>
	</div>
</div>