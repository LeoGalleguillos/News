CREATE TABLE `article` (
    `article_id` int(10) unsigned not null auto_increment,
    `user_id` int(10) not null,
    `title` varchar(255) not null,
    `body` text not null,
    `views` int unsigned not null default 0,
    `created` datetime not null,
    `deleted` datetime default null,
    PRIMARY KEY (`article_id`),
    INDEX `deleted_created` (`deleted`, `created`)
) default charset=utf8mb4 collate=utf8mb4_unicode_ci;
