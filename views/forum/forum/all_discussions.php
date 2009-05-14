<h2>All Discussions</h2>
<ul>
	<?php foreach ($discussions as $discussion):?><li><?=html::anchor('forum/discussion/'.$discussion->id, $discussion->title)?></li>
	<?php endforeach;?>
</ul>