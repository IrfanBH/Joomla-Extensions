<?php
defined('_JEXEC') or die;
?>
<div class="row padded-top">
	<div class="col-xs-12 col-lg-8 col-lg-offset-2">
		<h2><?php echo $module->title;?></h2>
	</div>
</div>
<div class="row padded-bottom">
	<!-- Begin Gallery -->
	<ul class="folio-list">
	<?php foreach ($objects as $key => $value) {?>
		<!-- Project 1 -->
		<li class="col-xs-10 col-xs-offset-1 col-sm-5 col-lg-4 <?php echo(($key+1)%2!=0)?'col-lg-offset-2 col-sm-offset-1':'col-sm-offset-0';?>">
			<a class="lightbox" href="<?php echo JURI::base();?>images/persona_portfolio/<?php echo $value['image'];?>">
				<div class="atvImg">
					<img src="<?php echo JURI::base();?>images/persona_portfolio/<?php echo $value['image'];?>" alt="<?php echo $value['title'];?>">
					<div class="atvImg-layer" data-img="<?php echo JURI::base();?>images/persona_portfolio/<?php echo $value['image'];?>"></div>
				</div>
			</a>
		</li>
	<?php };?>
	</ul><!-- END Gallery -->
</div>
