Requirements
------------
PHP 5.3+
Apache or Nginx
MySQL or MariaDB

Installation
------------
Steps 
1. Extract the archive file to your apache/nginx root directory. It will look like '/var/www/commentsystem'
2. Import commentsystem.sql
3. Modify the DB configuration from DatabaseConnection.php 
4. Make a virtual host or just run http://localhost/commentsystem .

Functionalities
---------------
- To make this web application system secured, XSS attack, SQL Injection attack and CSRF attack has been considered here. 
- Very basic yet effective blank field strategy has been implemented to spam control. 
- Required field and email validation has been implemented.

Flow of serving request
-----------------------
All requests come to index.php with a querystring 'q'. RequestHandler parse the request and find out the mapped action to call. All fallback redirects to default location i.e all posts page. Action contains all the methods to serve the request. System calls the mapped action of Action object. Mapped action loads data from Post object which contains all the business logic and transactional logic. Finally mapped action includes the views along with the loaded data. Graphically -

	 ?q=post/new                     actionName               Data
Request --------------> RequestHandler --------------->Action <---------Post
							 | 
							 |
							 V

						Template ( Ex. post.php) 

							 |
							 | 
			Served HTML			 V 
        <-------------------------------------------------  


N.B. No external php library of framework has been used. Only jquery.js and bootstrap.css has been used for UI. 														
