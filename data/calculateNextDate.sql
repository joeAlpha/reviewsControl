DELIMITER $$

CREATE TRIGGER calculateNextDate
BEFORE UPDATE ON review
FOR EACH ROW
BEGIN
    CASE NEW.number_of_review
        WHEN 0 THEN
            update review set review_date = adddate(review_date, 1) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 1) WHERE NEW.id = NEW.id; */
        WHEN 1 THEN
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 2); */
            update review set review_date = adddate(review_date, 2) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 2) WHERE id = NEW.id; */
        WHEN 2 THEN
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 4); */
            update review set review_date = adddate(review_date, 4) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 4) WHERE id = NEW.id; */
        WHEN 3 THEN
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 8); */
            update review set review_date = adddate(review_date, 8) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 8) WHERE id = NEW.id; */
        WHEN 4 THEN
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 16); */
            update review set review_date = adddate(review_date, 16) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 16) WHERE id = NEW.id; */
        WHEN 5 THEN
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 32); */
            update review set review_date = adddate(review_date, 32) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 32) WHERE id = NEW.id; */
        WHEN 6 THEN
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 64); */
            update review set review_date = adddate(review_date, 64) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 64) WHERE id = NEW.id; */
        WHEN 7 THEN
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 128); */
            update review set review_date = adddate(review_date, 128) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 128) WHERE id = NEW.id; */
        WHEN 8 THEN
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 256); */
            update review set review_date = adddate(review_date, 256) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 256) WHERE id = NEW.id; */
        WHEN 9 THEN
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 512); */
            update review set review_date = adddate(review_date, 512) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 512) WHERE id = NEW.id; */
        WHEN 10 THEN
            update review set review_date = adddate(review_date, 1024) where review_id = NEW.review_id;
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 1024); */
            /* SET NEW.review_date = ADDDATE(NEW.review_date, 1024) WHERE id = NEW.id; */
    END CASE;
END$$
DELIMITER ;
