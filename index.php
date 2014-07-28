<?php

/**
 * @file
 * The page serves all page requests of this CommentSystem.
 *
 */

require_once 'RequestHandler.php';
require_once 'DatabaseConnection.php';
require_once 'Action.php';
require_once 'Post.php';

$databaseConnection = new DatabaseConnection();

$requestHandler = new RequestHandler();
$actionName = $requestHandler->getActionName();
$actionParameter = $requestHandler->getActionParameter();

$action = new Action();
$action->$actionName($actionParameter);


