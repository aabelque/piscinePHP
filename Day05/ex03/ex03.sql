INSERT INTO db_aabelque.`ft_table` (`login`, `groupe`, `creation_date`)
(SELECT last_name, 3, birthdate
	FROM `user_card`
	WHERE `last_name` LIKE '%a%' AND LENGTH(`last_name`) < 9
	ORDER BY `last_name` ASC
	LIMIT 10);
