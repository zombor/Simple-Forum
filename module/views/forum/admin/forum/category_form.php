<h2><?=$action?> Category</h2>
<?=form::open()?>
<ul>
	<li><label for="name">Category Name:</label> <?=form::input('name', $category->name)?></li>
	<li><label for="order">Category Order:</label> <?=form::input('order', $category->order)?></li>
	<li><?=form::submit('submit', $action.' Category')?></li>
</ul>
<?=form::close()?>