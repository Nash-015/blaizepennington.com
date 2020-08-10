<h2><?= esc($title);?></h2>

<?php if(! empty($news) && is_array($news)): ?>

<?php foreach($news as $news_item): ?>

<h2><?= esc($news_item['title']);?></h2>
<div class="main"><p><?= esc($news_item['body']);?></p></div>
<p><a href="/news/<?= esc($news_item['slug'], 'url');?>">View Article</a></p>
<?php endforeach;?>
<?php else: ?>
  <h2>No News</h2>
<?php endif;?>
