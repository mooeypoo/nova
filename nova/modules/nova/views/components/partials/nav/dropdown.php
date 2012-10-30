<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<a href="<?php echo Uri::create('main/index');?>" class="brand"><?php echo $name;?></a>

			<div class="nav-collapse">
				<?php echo $userMenu;?>

				<ul class="nav">
				<?php foreach ($items[$section]['items'][$category] as $item): ?>
					<?php if (is_array($items[$section][$category])): ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $item->name;?> <b class="caret"></b></a>

							<ul class="dropdown-menu">
							<?php foreach ($items[$section][$category] as $i): ?>
								<?php if ($i->order == 0 and $i->group != 0): ?>
									<li class="divider"></li>
								<?php endif;?>
								
								<li><a href="<?php echo Uri::create($i->url);?>"<?php if($i->url_target == 'offsite'){ echo ' target="_blank"'; }?>><?php echo $i->name;?></a></li>
							<?php endforeach;?>
							</ul>
						</li>
					<?php else: ?>
						<li><a href="<?php echo Uri::create($item->url);?>"<?php if ($item->url_target == 'offsite'){ echo ' target="_blank"';}?>><?php echo $item->name;?></a></li>
					<?php endif;?>
				<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
</div>