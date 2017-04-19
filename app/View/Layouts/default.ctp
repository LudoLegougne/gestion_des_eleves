
<?php echo $this->Html->docType('html5'); ?>
<html lang="fr">
	<head>
		<?php
			echo $this->Html->charset();
	        echo $this->Html->css('style');
	        echo $this->fetch('css');
//	        echo $this->Html->meta('icon');
	        echo $this->fetch('meta');
//	        echo $this->Html->css('cake.generic');
	    ?>
	    <title>
	    	<?php //echo $title_for_layout; ?>
	    	Gestion des élèves
	    </title>
	</head>
	<body>
	    <?php echo $this->element('navigation_Bar'); ?>
		<div>
			<div id="content" >
				<?php
					echo $this->fetch('content');
//					echo $content_for_layout;
				?>
			</div>
			<div class="footer">
				<p> Auteur : Ludovic Legougne 2017 - Développement informatique.</p>
			</div>
		</div>
	</body>
	<?php echo $this->Html->script('script'); ?>
	<?php echo $this->fetch('script'); ?>
</html>
