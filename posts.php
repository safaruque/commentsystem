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
        <div class="col-md-12">
          <hr />
          <div id="post-container">
            
          </div>
          <hr />
        </div>
      </div>
    </div>
    <footer>    
      
    </footer>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
  </body>
</html>