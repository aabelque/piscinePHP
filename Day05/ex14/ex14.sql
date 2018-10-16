SELECT `floor_number` AS 'floor', SUM(`nb_seats`) AS 'seats' FROM db_aabelque.`cinema` GROUP BY `floor_number` ORDER BY `seats` DESC;
