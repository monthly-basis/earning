CREATE TABLE `earning` (
    `earning_id` int(10) unsigned auto_increment,
    `user_id` int(10) unsigned not null,
    `entity_id` int(10) default null,
    `entity_type_id` int(10) unsigned not null,
    `type_id` int(10) unsigned not null,
    `amount` float(4,2) not null,
    `created` datetime not null,
    PRIMARY KEY (`earning_id`),
    KEY `user_id` (`user_id`)
) charset=utf8;
