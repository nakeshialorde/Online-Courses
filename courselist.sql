CREATE TABLE `courselist` (
  `Course` varchar(25) NOT NULL,
  `CourseID` int(25) NOT NULL,
  `Level` varchar(25) NOT NULL,
  `Duration` int(25) NOT NULL,
  `Assigned_Tutor` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

INSERT INTO `courselist` (`Course`, `CourseID`, `Level`, `Duration`, `Assigned_Tutor`) VALUES
('Mathematics',	1278,	'CSEC',	12,	''),
('English Language',	1279,	'CSEC',	12,	''),
('Principles of Business',	1280,	'CSEC',	12,	''),
('Office Procedures',	1281,	'CSEC',	12,	''),
('Additional Mathematics',	1282,	'CSEC',	12,	'');

-- Indexes for table `courses`
--
ALTER TABLE `courselist`
  ADD PRIMARY KEY (`Course`),
  ADD UNIQUE KEY `CourseID` (`CourseID`);

SELECT tutors246_login AS courselist, tutors246_login AS login FROM 

 CURRENT_DATE(  );
 CURRENT_TIME(  ); 