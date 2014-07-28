<!DOCTYPE html>
<html>
  <head>
    <title>Comment System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header>  
      <div class="container">
        <!-- Site title --> 
        <div class="row">
          <div class="title col-md-12"><h1>Comment System</h1></div>
        </div>
        <!--Navigation -->
        <nav>
          <ul>
            <li><a href="?q=post/new">Add a new post</a></li>
            <li><a href="?q=posts">All posts</a></li>
        </nav>
      </div>  
    </header>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <hr />
          <?php if($post): ?>
            <h6><strong><?php print $post->name ?></strong> ( <?php print $post->email ?> ) - <em><?php print $post->created_at; ?></em></h6>
            <div>
              <?php print html_entity_decode(nl2br($post->message)); ?>
            </div>
            <hr />
            <div class="row">
              <h4>Comments : </h4>
              <div class="col-md-10">
                <?php if(empty($comments)): ?>
                  <div class="alert alert-info">There is no comment yet. Be the first.</div>
                <?php endif; ?>
                <?php foreach($comments as $comment): ?>
                  <h6><?php print $comment->name ?> ( <?php print $comment->email ?> ) - <em><?php print $comment->created_at; ?></em></h6>
                  <div>
                    <?php print html_entity_decode(nl2br($comment->message)); ?>
                  </div>
                  <hr />
                <?php endforeach; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <?php if (!empty($flash_message)): ?>
                  <div class="alert <?php echo $flash_message['class']; ?>" role="alert"><?php echo $flash_message['text']; ?></div>
                <?php endif; ?>
                <h4>Leave a comment : </h4>
                  <form action="" method="post">
                    <input type="hidden" name="csrf_token" value="<?php print $_SESSION['csrf_token'] ?>" />
                    <input type="hidden" name="post_id" value="<?php print $post->id ?>" />
                    <div class="form-group">
                      <label for="name">Name*</label>
                      <input type="text" class="form-control" name="name" id="emails" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email address*</label>
                      <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="message">Message*</label>
                      <textarea name="message" class="form-control " id="message" placeholder="Enter message"></textarea>
                    </div>
                    <div id="empty_spam_protector_wrapper" class="form-group">
                      <label>Leave this field blank</label>
                      <input type="text" name="empty_spam_protector" class="form-control" id="empty_spam_protector" />
                    </div>

                    <input type="submit" class="btn btn-default btn-lg" name="submit" value="Post comment">
                  </form>
              </div>
            </div>
          <?php else: ?>
            <div class="alert alert-warning" role="alert">No post found with this ID!</div>
          <?php endif; ?>
          <hr />
        </div>
      </div>
    </div>
    <footer>    
      
    </footer>
  </body>
</html>