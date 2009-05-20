<h2>All Discussions</h2>
<ul>
	<?php foreach ($discussions as $discussion):?>
		<li>
			<div class="forum_discussion_title"><?=html::anchor('forum/discussion/'.$discussion->id, $discussion->title)?></div>
			<div class="forum_discussion_details clearfix">
				<div class="forum_discussion_total_comments"><?=count($discussion->find_related('forum_comments'))?> comments</div>
				<div class="forum_discussion_date">Last Comment: <?=date('Y/m/d', $discussion->find_newest_comment()->date)?></div>
				<div class="forum_discussion_author">By: <?=$discussion->find_newest_comment()->user->name?></div>
			</div>
	<?php endforeach;?>
</ul>