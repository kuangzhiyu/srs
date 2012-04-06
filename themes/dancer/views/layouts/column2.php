<?php $this->beginContent('//layouts/main'); ?>

	<div id="usercontent">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div id="usermenu">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'<span class="icon icon-sitemap_color">Operations</span>',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		
		</div><!-- sidebar -->
	</div>
<?php $this->endContent(); ?>