<p class="forum_category_page_links">Page: <?php for ($i = 1; $i <= $num_pages; $i++):?><?=html::anchor('forum/category/'.$category->id.'?page='.$i, $i, array('class' => $this->input->get('page', 1) == $i ? 'active' : 'inactive'))?> <?php endfor;?></p>

<h2><?=$category->name?></h2>

<?php if (Auth::instance()->logged_in()):?><p><?=html::anchor('forum/create_discussion/'.$category->id, 'Create New Discussion')?></p><?php endif;?> 

<ul>
	<?php foreach ($discussions as $discussion):?>
	<li>
		<div class="forum_discussion_title"><?=html::anchor('forum/discussion/'.$discussion->id, $discussion->title)?></div>
		<div class="forum_discussion_details clearfix">
			<div class="forum_discussion_total_comments"><?=count($discussion->find_related('forum_comments'))?> comments</div>
			<div class="forum_discussion_date">Last Comment: <?=date('Y/m/d', $discussion->find_newest_comment()->date)?></div>
			<div class="forum_discussion_author">By: <?=$discussion->find_newest_comment()->user->name?></div>
		</div>
	</li>
	<?php endforeach;?>
</ul>