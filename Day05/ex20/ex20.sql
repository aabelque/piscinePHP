SELECT `genre`.id_genre AS 'id_genre', `genre`.name AS 'name_genre', `distrib`.id_distrib AS 'id_distrib', `distrib`.name AS 'name_distrib', `film`.title AS 'title_film' FROM db_aabelque.`genre` LEFT JOIN db_aabelque.`film` ON `genre`.id_genre = `film`.id_genre LEFT JOIN db_aabelque.`distrib` ON `distrib`.id_distrib = `film`.id_distrib WHERE (`genre`.id_genre >= 3 AND `genre`.id_genre <= 9);