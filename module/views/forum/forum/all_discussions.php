<h2>All Discussions</h2>
<ul>
	<?php foreach ($discussions as $discussion):?>
		<li>
			<div class="forum_discussion_title"><?=html::anchor('forum/discussion/'.$discussion->id, $discussion->title)?></div>
			<div class="forum_discussion_date">Started On: <?=date('Y/m/d', $discussion->date_created)?></div>
			<div class="forum_dicussion_comment">Last Post By: <?=$discussion->find_newest_comment()->user->name?> On <?=date('Y/m/d', $discussion->find_newest_comment()->date)?></div>
		</li>
	<?php endforeach;?>
</ul>