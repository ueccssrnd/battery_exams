/*
baterya
University of the East Research and Development Unit
Daryll Santos, <daryll.santos@gmail.com>
Copyright (c) 2013
http://opensource.org/licenses/mit-license.php
https://www.facebook.com/ueccssrnd
*/

CREATE DATABASE baterya;
USE baterya;

CREATE TABLE IF NOT EXISTS `guests` (
  `guest_id` varchar(60) NOT NULL,
  `guest_name` varchar(60) NOT NULL,
  `guest_type` varchar(60) NOT NULL,
  `date_of_registration` varchar(60) NOT NULL,
  PRIMARY KEY (`guest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


INSERT INTO `guests` (`guest_id`, `guest_name`, `guest_type`, `date_of_registration`) VALUES
('GUT-160711-21SEP2000', 'Gutierrez, Alvin Tranquilino', 'member', 'September 21, 2000'),
('AFA-110936-01SEP2004', 'Afable, Jovy Mansalapus', 'non-member', 'September 1, 2004')
;


/* End of file scheme.sql */