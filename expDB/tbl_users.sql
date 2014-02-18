DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  
 `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE latin1_bin NOT NULL,
  `password` varchar(60) COLLATE latin1_bin NOT NULL,
`email` varchar(80) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `tbl_users` ( `id`username`, `password`,`email`) VALUES
(1,'jose', 'pakyow','cool@hotmail.com');