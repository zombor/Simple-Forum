<div class="forum_discussion_header clearfix">
	<p class="forum_discussion_page_links">Page: <?php for ($i = 1; $i <= $num_pages; $i++):?><?=html::anchor('forum/discussion/'.$discussion->id.'?page='.$i, $i, array('class' => $this->input->get('page', 1) == $i ? 'active' : 'inactive'))?> <?php endfor;?></p>
	<h2><?=$discussion->title?></h2>
	<div class="forum_discussion_author">Started by: <?=$discussion->user->name?></div>
	<div class="forum_disucssion_date">On: <?=date('Y/m/d', $discussion->date_created)?></div>
</div>
<ul id="discussion_list">
	<?php foreach ($comments as $comment):?>
	<li>
		<div class="forum_comment_header clearfix">
			<?php if ($comment->user->id == $_SESSION['forum_user']->id OR Auth::instance()->logged_in('admin')):?>
			<div class="forum_comment_admin_links">
				<div class="forum_comment_edit"><?=html::anchor('admin/forum/edit_comment/'.$comment->id, 'Edit')?></div>
				<div class="forum_comment_delete"><?=html::anchor('admin/forum/delete_comment/'.$comment->id, 'Delete')?></div>
			</div>
			<?php endif;?>
			<div class="forum_comment_id" id="comment_<?=$comment->id?>"><a href="#comment_<?=$comment->id?>">Comment #<?=$comment->id?></a></div>
			<div class="forum_comment_author">By: <?=$comment->user->name?></div>
			<div class="forum_comment_date">Posted On: <?=date('Y/m/d', $comment->date)?></div>
		</div>
		<div class="forum_comment_content"><?=markdown($comment->content)?></div>
	</li>
	<?php endforeach;?>
</ul>
<h4>Add Comment</h4>
<?php if (Auth::instance()->logged_in()):?>
<?=form::open('forum/create_comment/'.$discussion->id)?>
<ul>
	<li><?=form::textarea('content')?></li>
	<li><?=form::submit('submit', 'Submit')?></li>
</ul>
<?=form::close()?>
<?php else:?>
<p>You must be <?=html::anchor('user/login', 'logged in')?> to post comments.</p>
<?php endif;?> 