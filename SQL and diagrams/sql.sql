/* Creating the necessary tables for the database */
/* testdata.sql has data to test out */

CREATE TABLE `user` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `first` varchar(128) NOT NULL,
  `last` varchar(128) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `pwd` varchar(1000) NOT NULL
);

CREATE TABLE `comments` (
  `cid` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(128) NOT NULL
);

