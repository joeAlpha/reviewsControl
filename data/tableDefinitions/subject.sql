CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
)