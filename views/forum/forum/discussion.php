<h2><?=$discussion->title?></h2>
<ul>
	<?php foreach ($comments as $comment):?>
	<li>
		<h3><?=$comment->title?></h3>
		<h4><?=$comment->user->first_name.' '.$comment->user->last_name?></h4>
		<?=$comment->content?>
	</li>
	<?php endforeach;?>
</ul>