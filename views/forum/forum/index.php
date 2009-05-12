<h2>Forums!</h2>
<ul>
	<?php foreach ($categories as $category):?><li><?=html::anchor('forum/category/'.$category->id, $category->name)?></li>
	<?php endforeach;?> 
</ul>
<p><?=html::anchor('admin/forum/create_category', 'Create New Category')?></p>