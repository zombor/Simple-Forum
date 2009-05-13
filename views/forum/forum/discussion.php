<ul>
	<?php foreach ($comments as $comment):?>
	<li>
		<h3><?=$comment->title?></h3>
		<h4><?=$comment->user->first_name.' '.$comment->user->last_name?></h4>
		<?=$comment->content?>
	</li>
	<?php endforeach;?>
</ul>
<?php if (Auth::instance()->logged_in()):?><h4>Add Comment</h4>
<?=form::open('forum/create_comment/'.$discussion->id)?>
<ul>
	<li><label for="title">Discussion Title</label> <?=form::input('title')?></li>
	<li><label for="content">Content</label> <?=form::textarea('content')?></li>
	<li><?=form::submit('submit', 'Submit')?></li>
</ul>
<?=form::close()?><?php endif;?> 