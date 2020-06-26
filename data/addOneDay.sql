
/* In order to implement the review theory, this
trigger sets the next review date to tomorrow, it
assumes that the user registered a new topic for first
time. */
CREATE TRIGGER setDefaultDate
    BEFORE INSERT ON review
    FOR EACH ROW
    SET NEW.review_date = ADDDATE(curdate(), INTERVAL 1 DAY);