<h2>Create New Discussion</h2>
<?=form::open()?>
<?=$errors?>
<ul>
	<li><label for="title">Discussion Title</label> <?=form::input('title', $comment->title)?></li>
	<li><label for="content">Content</label> <?=form::textarea('content', $comment->content)?></li>
	<li><?=form::submit('submit', 'Submit')?></li>
</ul>
<?=form::close()?>