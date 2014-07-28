-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2014 at 03:36 PM
-- Server version: 5.5.38-MariaDB-1~trusty-log
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `commentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 1, 'John Doe', 'johndoe@example.com', 'Etiam ullamcorper felis congue volutpat bibendum. Quisque gravida erat ut libero condimentum malesuada. Maecenas varius eleifend nisi, at lacinia sapien lacinia ac. Suspendisse potenti. Fusce ac risus quis nisl aliquet posuere. Sed sodales sapien ut pulvinar ultrices. Donec lacus elit, rutrum in eros non, cursus volutpat est. Aenean et volutpat erat. Ut dapibus est ac rhoncus varius. Proin id pulvinar risus, ut tincidunt mi. Cras at facilisis urna.', '2014-07-28 07:20:24'),
(2, 1, 'Michael Stark', 'mic@stark.com', ' Nullam risus elit, hendrerit non eros mollis, aliquam sodales est. Pellentesque sit amet semper eros, a ullamcorper sem. Proin eu cursus purus. Nullam vel augue nulla. Nullam odio magna, &lt;a href=&quot;http://facebook.com&quot;&gt; vehicula ac sem&lt;/a&gt; et, laoreet pharetra erat. Aenean eu nisl eget elit accumsan porta.', '2014-07-28 07:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Safique Ahmed Faruque', 'safaruque1@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris egestas lobortis mi, mollis blandit tellus &lt;a href=&quot;http://microsoft.com&quot;&gt;feugiat quis&lt;/a&gt;. Ut porta lectus quis quam vestibulum, in bibendum felis dignissim. Etiam non dolor tincidunt mauris venenatis tristique. Aliquam erat volutpat. Etiam et tortor justo. Etiam lorem tortor, tincidunt quis dui fermentum, suscipit facilisis neque. &lt;a href=&quot;http://google.com&quot;&gt;Quisque sed&lt;/a&gt; fermentum tellus. Aenean id posuere lectus, sed ullamcorper nisl.\r\n\r\nMauris consectetur malesuada lorem gravida euismod. Vivamus dictum neque non tortor venenatis, in vehicula risus sodales. Maecenas et sem dapibus, sagittis erat pellentesque, dignissim quam. Vivamus libero erat, fermentum non dignissim in, porta vel risus. Nullam risus elit, hendrerit non eros mollis, aliquam sodales est. Pellentesque sit amet semper eros, a ullamcorper sem. Proin eu cursus purus. Nullam vel augue nulla. Nullam odio magna, vehicula ac sem et, laoreet pharetra erat. Aenean eu nisl eget elit accumsan porta. Pellentesque hendrerit in nulla ut fermentum. Fusce lacinia dui in nibh commodo, tincidunt lacinia nisi convallis.', '2014-07-28 07:11:52'),
(2, 'Steven Hanks', 'steve@example.com', 'Pellentesque sit amet volutpat dolor. Praesent tempor vestibulum quam, quis ullamcorper leo pellentesque non. Mauris commodo lacus sit amet est eleifend fermentum. Nullam semper enim sem, eget congue nunc bibendum posuere. Mauris leo purus, consectetur a accumsan vitae, auctor at orci. Nullam ut lacus nibh. In ut magna arcu. In sagittis congue porta. Duis nec dolor nec ipsum fringilla tristique. Maecenas non odio vitae ligula semper tristique. Nunc vulputate arcu id pretium semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices facilisis risus, eget vulputate dolor mollis non. Aenean interdum erat massa, hendrerit ornare nisl sollicitudin id. Nunc consectetur ultrices leo, a convallis lorem condimentum vel. Ut adipiscing ligula in nisl varius semper.', '2014-07-28 07:35:11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
