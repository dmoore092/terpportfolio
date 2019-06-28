CREATE DATABASE IF NOT EXISTS `portfolios`;

USE `portfolios`;

DROP TABLE IF EXISTS `terps`;
CREATE TABLE `terps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `pass` varchar(900) CHARACTER SET utf8 DEFAULT NULL,
  `profile_image` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `contact_phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `zip` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `college` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `major` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `graduation_year` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `certifications` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `account_type` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `twitter` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `facebook` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `instagram` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `linkedin` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `website` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `showcase1` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `showcase2` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `showcase3` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `service` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `personal_statement` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `reset` varchar(150) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO terps (id, email, pass, profile_image, name, gender, contact_phone, address, city, state, zip, college, major, graduation_year, certifications, account_type, twitter, facebook, instagram, linkedin, website, showcase1, showcase2, showcase3, service, personal_statement, reset, reset_expires)
VALUES (1, 'dmoore092@gmail.com', '$2y$10$dWJZTC/lIW.eguXhLf8O9u7NqsFzRpXuO4q9wEWu8tsUgrTAAHD9.', null, null, null, null, null, null, null , null, null, null, null, null, 'admin', null, null, null, null, null, null, null, null, null, null, null, null),
(2, 'ariakkas10@hotmail.com', '$2y$10$dWJZTC/lIW.eguXhLf8O9u7NqsFzRpXuO4q9wEWu8tsUgrTAAHD9.', null, 'Mike Smith', 'Male', '555-121-1212', '127 Maple St', 'Rochester', 'New York' , '14586', 'RIT', 'Web Development', '2020', 'None', 'terp', '@dmoore092', 'none', 'none', 'none', 'none', null, null, null, null, 'test', null, null);
