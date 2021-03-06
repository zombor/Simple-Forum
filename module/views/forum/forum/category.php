<p class="forum_category_page_links">Page: <?php for ($i = 1; $i <= $num_pages; $i++):?><?=html::anchor('forum/category/'.$category->id.'?page='.$i, $i, array('class' => $this->input->get('page', 1) == $i ? 'active' : 'inactive'))?> <?php endfor;?></p>

<h2><?=$category->name?></h2>

<?php if (Auth::instance()->logged_in()):?><p><?=html::anchor('forum/create_discussion/'.$category->id, 'Create New Discussion')?></p>
<?php else:?>
<p>You must be <?=html::anchor('user/login', 'logged in')?> to create discussions.</p>
<?php endif;?> 

<ul id="category_list">
	<?php foreach ($discussions as $discussion):?>
	<li<?=$discussion->user_has_not_read($_SESSION['forum_user']->id) ? ' class="unread"' : ''?>>
		<?php if ($discussion->user->id == $_SESSION['forum_user']->id OR Auth::instance()->logged_in('admin')):?>
		<div class="forum_discussion_admin_links">
			<div class="forum_discussion_delete"><?=html::anchor('admin/forum/delete_discussion/'.$discussion->id, 'Delete')?></div>
		</div>
		<?php endif;?>
		<div class="forum_discussion_title"><?=html::anchor('forum/discussion/'.$discussion->id, $discussion->title)?></div>
		<div class="forum_discussion_details clearfix">
			<div class="forum_discussion_total_comments"><?=count($discussion->find_related('forum_comments'))?> comments</div>
			<div class="forum_discussion_date">Last Comment: <?=date('Y/m/d', $discussion->find_newest_comment()->date)?></div>
			<div class="forum_discussion_author">By: <?=$discussion->find_newest_comment()->user->name?></div>
		</div>
	</li>
	<?php endforeach;?>
	<?php if ( ! count($discussions)):?><h3>There are no discussions in this category.</h3><?php endif;?> 
</ul>