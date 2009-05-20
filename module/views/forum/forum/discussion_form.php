<h2>Create New Discussion</h2>
<?=form::open()?>
<?=$errors?>
<ul>
	<li><label for="content">Content</label><br /><?=form::textarea('content', $comment->content)?></li>
	<li><?=form::submit('submit', 'Submit')?></li>
</ul>
<?=form::close()?>