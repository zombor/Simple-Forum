<div class="forum_discussion_header">
	<h2><?=$discussion->title?></h2>
	<div class="forum_discussion_author">Started by: <?=$discussion->user->name?></div>
	<div class="forum_disucssion_date">On: <?=date('Y/m/d', $discussion->date_created)?></div>
</div>
<ul>
	<?php foreach ($comments as $comment):?>
	<li>
		<div class="forum_comment_header">
			<div class="forum_comment_id" id="comment_<?=$comment->id?>"><a href="#comment_<?=$comment->id?>"><?=$comment->id?></a></div>
			<div class="forum_comment_author"><?=$comment->user->first_name.' '.$comment->user->last_name?></div>
			<div class="forum_comment_date"><?=date('Y/m/d', $comment->date)?></div>
		</div>
		<div class="forum_comment_content"><?=$comment->content?></div>
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