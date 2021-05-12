CREATE TABLE IF NOT EXISTS `users_pj` (
    `id` int(11) NOT NULL,
    `username` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `photo` varchar(255) NOT NULL, 
    `level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1;
