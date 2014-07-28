<?php

/**
 * All business logics and data management of posts reside here.
 *
 */
class Post {
  public function __construct() {

  }
  
  /**
   * Get all posts.
   * 
   * @return array of objects
   */
  public function getPosts() {
    $query = "SELECT id, name, email, message, created_at FROM posts";
    $result = mysql_query($query);
    $posts = array();
    
    if(mysql_num_rows($result) > 0){
      while ($post = mysql_fetch_object($result)) {
        $posts[] = $post;
      }
    }
    return $posts;
  }
  
  /**
   * Get a single post
   * 
   * @param int $post_id
   * @return object
   */
  public function getPost($post_id){
    $post = NULL;
    $post_id = mysql_real_escape_string($post_id);
    $query = "SELECT id, name, email, message, created_at FROM posts WHERE id = $post_id";
    $result = mysql_query($query);
    if(mysql_num_rows($result) == 1){
      $post = mysql_fetch_object($result);
      $date = new DateTime($post->created_at);
      $post->created_at = $date->format('jS F Y \a\t g:ia');
    }
    return $post;
  }


  /**
   * Get the posts which is newer than particular post. It is used to incrementally append to the list of posts.
   * 
   * @param int $post_id
   * @return array of objects
   */
  public function getNewerPosts($post_id) {
    $query = "SELECT id, name, email, message, created_at FROM posts WHERE id > $post_id ORDER BY created_at DESC";
    
    $result = mysql_query($query);
    $posts = array();
    
    if(mysql_num_rows($result) > 0){
      while ($post = mysql_fetch_object($result)) {
        $posts[] = $post;
      }
    }
    
    return $posts;
  }
  
  /**
   * Validates new posts and comments as they are having same form.
   * 
   * @return boolean
   */
  public function validate() {
    $required = array('name', 'email', 'message' );
    foreach ($required as $field_name){
      if(empty($_POST[$field_name])){
        return FALSE;
      }
    }
    
    $sanitized_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if(!filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)){
      return FALSE;
    }
    
    if($_SESSION['csrf_token'] != $_POST['csrf_token']){
      return FALSE;
    }
    
    if(!empty($_POST['empty_spam_protector'])){
      return FALSE;
    }
    
    return TRUE;
  }
  
  /**
   * Saves new post.
   * 
   * @return int
   */
  public function save() {
    /*
     * mysql_real_escape_string function has been used to preven SQL Injection. 
     * Although it is better to use prepared statement but we are not using any external php library (Ex. PDO) here.
     */
    $name = mysql_real_escape_string($_POST['name']);
    //It will strip all tags which will prevent XSS attack and remove unnecessary spaces from both the end.
    $name = strip_tags(trim($name));

    $email = mysql_real_escape_string($_POST['email']);
    //It will strip all tags which will prevent XSS attack and remove unnecessary spaces from both the end.
    $email = strip_tags(trim($email));

    $message = mysql_real_escape_string($_POST['message']);
    $message = nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8'));
    
    $query = "INSERT INTO posts (name, email, message) VALUES ('$name', '$email', '$message')";

    mysql_query($query);
    return mysql_insert_id();
  }
  
  /**
   * Save new comment
   * 
   * @return int
   */
  public function saveComment() {
    /*
     * mysql_real_escape_string function has been used to preven SQL Injection. 
     * Although it is better to use prepared statement but we are not using any external php library (Ex. PDO) here.
     */
    $post_id = intval($_POST['post_id']);
    
    $name = mysql_real_escape_string($_POST['name']);
    //It will strip all tags which will prevent XSS attack and remove unnecessary spaces from both the end.
    $name = strip_tags(trim($name));

    $email = mysql_real_escape_string($_POST['email']);
    //It will strip all tags which will prevent XSS attack and remove unnecessary spaces from both the end.
    $email = strip_tags(trim($email));

    $message = mysql_real_escape_string($_POST['message']);
    $message = nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8'));
    
    $query = "INSERT INTO comments (post_id, name, email, message) VALUES ($post_id, '$name', '$email', '$message')";

    mysql_query($query);
    return mysql_insert_id();
  }
  
  /**
   * Get all comments of corresponding post.
   * 
   * @param type $post_id
   * @return type
   */
  public function getComments($post_id) {
    $query = "SELECT id, post_id, name, email, message, created_at FROM comments "
            . "WHERE post_id = $post_id ORDER BY created_at DESC";
    $result = mysql_query($query);
    $comments = array();
    
    if(mysql_num_rows($result) > 0){
      while ($comment = mysql_fetch_object($result)) {
        $comments[] = $comment;
        $date = new DateTime($comment->created_at);
        $comment->created_at = $date->format('jS F Y \a\t g:ia');
      }
    }
    
    return $comments;
  }
  
  /**
   * Trims the text to display gently in list of posts.
   * 
   * @param string $text
   * @return string
   */
  public function trimToTeaser($text) {
    $max_length = 300;

    if (strlen($text) > $max_length) {
      $offset = ($max_length - 3) - strlen($text);
      $text = substr($text, 0, strrpos($text, ' ', $offset)) . '...';
    }
    return $text;
  }
}
