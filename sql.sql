CREATE TABLE `user` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `first` varchar(128) NOT NULL,
  `last` varchar(128) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `pwd` varchar(1000) NOT NULL
);

CREATE TABLE 'comments' (
	'id' int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	'uid' varchar(128) NOT NULL,
	'date' datetime NOT NULL,
	'message' TEXT NOT NULL
);

CREATE TABLE `comments` (
  `cid` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `uid` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(128) NOT NULL
);
