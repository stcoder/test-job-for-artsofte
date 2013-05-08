
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- books
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(200),
    `description` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
