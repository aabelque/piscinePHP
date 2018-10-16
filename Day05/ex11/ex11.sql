SELECT UCASE(`last_name`) AS 'NAME', `first_name`, `price` FROM db_aabelque.`user_card` INNER JOIN db_aabelque.`member` ON user_card.id_user = member.id_user_card INNER JOIN db_aabelque.`subscription` ON member.id_sub = subscription.id_sub WHERE subscription.price > 42 ORDER BY `last_name`, `first_name` ASC;
