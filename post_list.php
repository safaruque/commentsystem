<?php if(empty($post_list)): ?>
  <div class="alert alert-info">There is no post yet.</div>
<?php endif; ?>
<?php foreach ($post_list as $post): ?>
<div class="post-list-item">
    <h6><strong><?php print $post->name ?></strong>( <?php print $post->email ?> ) - <em><?php print $post->created_at; ?></em></h6>
    <div>
      <?php print $postModel->trimToTeaser(html_entity_decode($post->message)); ?>
    </div>
    <div><a href="/?q=post/<?php print $post->id ?>" class="btn btn-success">read more</a></div>
  </div>
<?php endforeach; ?>