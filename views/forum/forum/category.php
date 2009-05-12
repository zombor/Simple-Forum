<h2><?=$category->name?></h2>
<ul>
	<?php foreach ($discussions as $discussion):?><li><?=html::anchor('forum/discussion/'.$discussion->id, $discussion->title)?></li>
	<?php endforeach;?>
</ul>
<p><?=html::anchor('forum/create_discussion/'.$category->id, 'Create New Discussion')?></p>