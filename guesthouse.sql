CREATE DATABASE guesthouse;
USE guesthouse;

CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(256) NOT NULL,
 `email` varchar(256) NOT NULL,
 `password` varchar(256) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `admin` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(256) NOT NULL,
 `email` varchar(256) NOT NULL,
 `password` varchar(256) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `guestinfo` (
 `id` varchar(256) NOT NULL ,
 `username` varchar(256) NOT NULL,
 `guestname` varchar(256) NOT NULL,
 `guestphone` varchar(12) NOT NULL,
 `status` varchar(256) NOT NULL DEFAULT 'Pending',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `guestaddress` (
 `id` varchar(256) NOT NULL ,
 `username` varchar(256) NOT NULL,
 `guestname` varchar(256) NOT NULL,
 `appartment` varchar(256) NOT NULL,
 `city` varchar(256) NOT NULL,
 `state` varchar(256) NOT NULL,
 `pin` varchar(6) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `indentorinfo` (
 `id` varchar(256) NOT NULL ,
 `username` varchar(256) NOT NULL,
 `guestname` varchar(256) NOT NULL,
 `employeeid` varchar(256) NOT NULL,
 `indentorname` varchar(256) NOT NULL,
 `designation` varchar(256) NOT NULL,
 `department` varchar(256) NOT NULL,
 `phone` varchar(256) NOT NULL,
 `email` varchar(256) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `roomrequirement` (
 `id` varchar(256) NOT NULL ,
 `username` varchar(256) NOT NULL,
 `guestname` varchar(256) NOT NULL,
 `number_people` int(11) NOT NULL,
 `payment` varchar(256) NOT NULL,
 `number_rooms` int(11) NOT NULL,
 `accomodation` varchar(256) NOT NULL,
 `arrival` date NOT NULL,
 `departure` date NOT NULL,
 `purpose` varchar(256) NOT NULL,
 `vegbreakfast` int(11) NOT NULL,
 `veglunch` int(11) NOT NULL,
 `vegdinner` int(11) NOT NULL,
 `nonvegbreakfast` int(11) NOT NULL,
 `nonveglunch` int(11) NOT NULL,
 `nonvegdinner` int(11) NOT NULL,
 `room` varchar(256) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `bookings` (
 `id` varchar(256) NOT NULL ,
 `username` varchar(256) NOT NULL,
 `guestname` varchar(256) NOT NULL,
 `status` varchar(256) NOT NULL DEFAULT 'Pending',
 `guestphone` varchar(12) NOT NULL,
 `appartment` varchar(256) NOT NULL,
 `city` varchar(256) NOT NULL,
 `state` varchar(256) NOT NULL,
 `pin` varchar(6) NOT NULL,
 `number_people` int(11) NOT NULL,
 `payment` varchar(256) NOT NULL,
 `number_rooms` int(11) NOT NULL,
 `accomodation` varchar(256) NOT NULL,
 `arrival` date NOT NULL,
 `departure` date NOT NULL,
 `purpose` varchar(256) NOT NULL,
 `vegbreakfast` int(11) NOT NULL,
 `veglunch` int(11) NOT NULL,
 `vegdinner` int(11) NOT NULL,
 `nonvegbreakfast` int(11) NOT NULL,
 `nonveglunch` int(11) NOT NULL,
 `nonvegdinner` int(11) NOT NULL,
 `indentorname` varchar(256) NOT NULL,
 `employeeid` varchar(256) NOT NULL,
 `designation` varchar(256) NOT NULL,
 `department` varchar(256) NOT NULL,
 `phone` varchar(256) NOT NULL,
 `email` varchar(256) NOT NULL,
 `requestedroom` varchar(256) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `rooms` (
 `room` varchar(256) NOT NULL,
 `type` varchar(256) NOT NULL,
 `roomposition` varchar(256) NOT NULL DEFAULT 'None',
 PRIMARY KEY (`room`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
