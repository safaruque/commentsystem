<?php

/**
 * This class is responsible for serving the html output according to the request.
 *
 * @author safaruque
 */
class Action {
  public function __construct() {
    session_start();
  }
  public function postsAction(){
    include 'posts.php';
  }
  
  public function postNewAction(){
    if(isset($_POST['submit']) && $_POST['submit'] == "Post"){
      $postModel = new Post();
      if($postModel->validate()){
        $successful = $postModel->save();
        if(!empty($successful)){
          header('Location:' . 'http://' . $_SERVER['SERVER_NAME'] . '/?q=post/' . $successful);
        } else {
          $flash_message = array(
            'class' => 'alert-danger',
            'text'  => 'Something went wrong!'
          );
        }
      } else {
        $flash_message = array(
            'class' => 'alert-danger',
            'text'  => 'You have a validation error!'
        );
      }
    }
    $csrf_token = base64_encode( openssl_random_pseudo_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;
    
    include_once 'post_new.php';
  }

  public function getHeadHTML(){
    return $this->headHTML;
  }
  
  public function postDetailsAction($post_id){
    $postModel = new Post();
    $post = $postModel->getPost($post_id);
    
    if(isset($_POST['submit']) && $_POST['submit'] == "Post comment"){
      
      if($postModel->validate()){
        $successful = $postModel->saveComment();
        if(!empty($successful)){
          $flash_message = array(
            'class' => 'alert-info',
            'text'  => 'Comment has been posted.'
          );
        } else {
          $flash_message = array(
            'class' => 'alert-danger',
            'text'  => 'Something went wrong!'
          );
        }
      } else {
        $flash_message = array(
            'class' => 'alert-danger',
            'text'  => 'You have a validation error!'
        );
      }
    }
    $csrf_token = base64_encode( openssl_random_pseudo_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;
    $comments = $postModel->getComments($post_id);
    include_once 'post.php';
  }
  
  public function postFetchLatestAction($from_post_id) {
    $postModel = new Post();
    $post_list = $postModel->getNewerPosts($from_post_id);
    include_once 'post_list.php';
  }
}




