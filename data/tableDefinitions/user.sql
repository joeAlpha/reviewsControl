CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `profile_picture` varchar(1024) DEFAULT 'no_picture',
  `password` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
)