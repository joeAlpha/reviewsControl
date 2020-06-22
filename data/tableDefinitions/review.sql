CREATE TABLE `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT curdate(),
  `fk_subject` int(11) NOT NULL,
  `number_of_review` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`review_id`)
)