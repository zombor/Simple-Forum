<h2>Create Discussion</h2>
<?=form::open()?>
<?=$errors?>
<ul>
	<li><label for="title">Title:</label><br /><?=form::input('title')?></li>
	<li><label for="content">Content</label><br /><?=form::textarea(array('name' => 'content', 'class' => 'comment_input_box', 'id' => 'content'))?></li>
	<li><?=form::submit('submit', 'Submit')?></li>
</ul>
<?=form::close()?>