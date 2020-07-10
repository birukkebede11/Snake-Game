-- Initial db tables 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Players 
CREATE TABLE `Games` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `play_date` date NOT NULL,
  PRIMARY KEY (pid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

