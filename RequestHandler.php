<?php

/**
 * RequestHandler parse the request and calls the proper action.
 *
 * @author safaruque
 */

class RequestHandler {

	private $actionParameter = null;
  private $route = array(
      '/' => 'postsAction',
      'post/new' => 'postNewAction',
      'post/%' => 'postDetailsAction',
      'post/from/%' => 'postFetchLatestAction'
  );
  private $actionName = NULL;

  /**
	 * create requesthandler.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
    if (!isset($_GET['q'])) {
      $this->actionName = 'postsAction';
      return;
    } 
    
    $filtered_route = $this->filterRoute($_GET['q']);
    if(array_key_exists($filtered_route, $this->route)){
      $this->actionName = $this->route[$filtered_route];
    } else {
      $this->actionName = 'postsAction';
    }
  }
  
  /**
   * Get the action name to call
   * 
   * @return string
   */
  public function getActionName(){
    return $this->actionName;
  }
  
  /**
   * Get the parameters to pass throug action
   * 
   * @return string
   */
  public function getActionParameter(){
    return $this->actionParameter;
  }
	
  /**
   * This function replaces integer values from path string to %. Resulted string can be checked to determine 
   * whether the path is in allowed path list $route.
   */
  public function filterRoute($path){
    $exploded_path = explode('/', $path);
    foreach($exploded_path as $key => $path_element){
      if(is_numeric($path_element)){
        $exploded_path[$key] = '%';
        $this->actionParameter = (int)$path_element;
      }
    }
    return implode('/', $exploded_path);
  }
}
