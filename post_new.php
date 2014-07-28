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
            <li><a href="?q=post/new">Add new</a></li>
            <li><a href="?q=posts">All posts</a></li>
        </nav>
      </div>  
    </header>
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
          <hr />     
          <?php if(!empty($flash_message)): ?>
            <div class="alert <?php echo $flash_message['class']; ?>" role="alert"><?php echo $flash_message['text']; ?></div>
          <?php endif; ?>
          <form action="" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo($_SESSION['csrf_token']) ?>" />
            
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
            <div id="form-group">
              <input type="submit" class="btn btn-default btn-lg" name="submit" value="Post">
            </div>
          </form>
          <hr />
        </div>
      </div>
    </div>
    <footer>    
      
    </footer>
  </body>
</html>