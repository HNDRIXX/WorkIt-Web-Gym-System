CREATE TABLE gymacc(
  unique_id         VARCHAR(10)  NOT NULL
  , username        VARCHAR(255) NOT NULL
  , password        VARCHAR(255) DEFAULT '123'
  , roles           VARCHAR(10)  DEFAULT 'member'
  , CONSTRAINT unique_id_pk PRIMARY KEY (unique_id)
);

CREATE TABLE member(
  unique_id         VARCHAR(10)  NOT NULL
  , mem_id	    VARCHAR(10)  NOT NULL
  , mem_FirstName   VARCHAR(50)  NOT NULL
  , mem_MiddleName  VARCHAR(50)  NOT NULL
  , mem_LastName    VARCHAR(50)  NOT NULL
  , mem_Gender      VARCHAR(10)  NOT NULL
  , mem_ContactNum  VARCHAR(20)  NOT NULL
  , mem_Address     VARCHAR(50)  NOT NULL
  , mem_Email	    VARCHAR(50)  NOT NULL
  , mem_Height      FLOAT(50)	 NOT NULL
  , mem_Weight      FLOAT(50)    NOT NULL
  , mem_Birthdate   DATE	 NOT NULL
  , mem_JoinedDate  DATE	 NOT NULL
  , CONSTRAINT mem_id_pk PRIMARY KEY (mem_id)
  , CONSTRAINT unique_id_fk1 FOREIGN KEY (unique_id) REFERENCES gymacc(unique_id)
);

CREATE TABLE trainer(
  unique_id         VARCHAR(10)  NOT NULL
  , trn_id	        VARCHAR(10)  NOT NULL
  , trn_FirstName   VARCHAR(50)  NOT NULL
  , trn_MiddleName  VARCHAR(50)  NOT NULL
  , trn_LastName    VARCHAR(50)  NOT NULL
  , trn_Gender      VARCHAR(10)  NOT NULL
  , trn_ContactNum  VARCHAR(20)  NOT NULL
  , trn_Address     VARCHAR(50)  NOT NULL
  , trn_Height      FLOAT(50)	 NOT NULL
  , trn_Weight      FLOAT(50)    NOT NULL
  , trn_Birthdate   DATE	 NOT NULL
  , CONSTRAINT trn_id_pk PRIMARY KEY (trn_id)
  , CONSTRAINT unique_id_fk FOREIGN KEY (unique_id) REFERENCES gymacc(unique_id)
);

CREATE TABLE announcement(
  ann_id		            VARCHAR(10)  NOT NULL
  , ann_Announce        VARCHAR(255) NULL
  , ann_Expire        	DATE NOT NULL
  , CONSTRAINT ann_id_pk PRIMARY KEY (ann_id)
);

CREATE TABLE plan(
  pln_id		VARCHAR(10)  NOT NULL
  ,pln_Name VARCHAR(255)  NOT NULL
  , pln_Description   VARCHAR(255) NOT NULL
  , pln_Day   int NOT NULL
  , pln_Price        	float	     NOT NULL
  , CONSTRAINT pln_id_pk PRIMARY KEY (pln_id)
);

CREATE TABLE session(
  ssn_id            VARCHAR(10)   NOT NULL
  , pln_id	    VARCHAR(10)   NOT NULL
  , mem_id	    VARCHAR(10)   NOT NULL
  , trn_id	    VARCHAR(10)   NOT NULL
  , ssn_Category    VARCHAR(255)  NOT NULL
  , ssn_TimeIn      TIME	  DEFAULT NULL
  , ssn_TimeOut     TIME 	  DEFAULT NULL
  , ssn_Day 	    int  NOT NULL
  , ssn_Paid	    VARCHAR(10)   NOT NULL
  , CONSTRAINT ssn_id_pk PRIMARY KEY (ssn_id)
  , CONSTRAINT pln_id_fk FOREIGN KEY (pln_id) REFERENCES plan(pln_id)
  , CONSTRAINT mem_id_fk FOREIGN KEY (mem_id) REFERENCES member(unique_id)
  , CONSTRAINT trn_id_fk FOREIGN KEY (trn_id) REFERENCES trainer(trn_id)
);

INSERT INTO `announcement`(`ann_id`,`ann_Announce`, `ann_Expire`)
VALUES(
    'anncmnt01',
    'Hello! We\'ve looking for ten new trainer! Apply Now!',
    '2022-05-17'
);


CREATE OR REPLACE VIEW member_vw AS
    SELECT `mm`.`mem_id` AS `ID`
           , CONCAT (`mm`.`mem_FirstName`, ' ',`mm`.`mem_LastName`) AS `MemberFullName`
           , `mm`.`mem_Gender` AS `Gender`
           , DATE_FORMAT(
        FROM_DAYS(
            TO_DAYS(CURRENT_TIMESTAMP()) - TO_DAYS(`mm`.`mem_Birthdate`)),
            '%Y'
        ) + 0 AS `Age`
           , `mm`.`mem_Address` AS `Address`
           , `mm`.`mem_ContactNum` AS `ContactNum`
           , `mm`.`mem_Height` AS `Height`
           , `mm`.`mem_Weight` AS `Weight`
           , `mm`.`mem_JoinedDate` AS `JoinedDate`
      FROM `member` `mm`;


CREATE OR REPLACE VIEW trainer_vw AS
    SELECT `tr`.`trn_id` AS `ID`
           , CONCAT (`tr`.`trn_FirstName`, ' ',`tr`.`trn_LastName`) AS `TrainerFullName`
           , `tr`.`trn_Gender` AS `Gender`
           , DATE_FORMAT(
        FROM_DAYS(
            TO_DAYS(CURRENT_TIMESTAMP()) - TO_DAYS(`tr`.`trn_Birthdate`)),
            '%Y'
        ) + 0 AS `Age`
           , `tr`.`trn_Address` AS `Address`
           , `tr`.`trn_ContactNum` AS `ContactNum`
           , `tr`.`trn_Height` AS `Height`
           , `tr`.`trn_Weight` AS `Weight`
      FROM `trainer` `tr`;



CREATE OR REPLACE VIEW plan_vw AS
    SELECT `pl`.`pln_id` AS `PlanID`
           , `pl`.`pln_Description` AS `Description`
	   , `pl`.`pln_Price` AS `Price`
      FROM `plan` `pl`;

CREATE OR REPLACE VIEW session_vw AS
    SELECT `sn`.`ssn_id` AS `SessionID`
	    , `mm`.`mem_id` AS `memID`
	    , `tr`.`trn_id` AS `trnID`
      , `pl`.`pln_id` AS `plnID`
      , `pl`.`pln_Description` AS `pln_Description`
      , CONCAT (`mm`.`mem_FirstName`, ' ',`mm`.`mem_LastName`) AS `MemberFullName`
           , CONCAT (`tr`.`trn_FirstName`, ' ',`tr`.`trn_LastName`) AS `TrainerFullName`
	   , `sn`.`ssn_Category` AS `Category`
           , `pl`.`pln_Name` AS `PlanName`
	   , `mm`.`mem_Email` AS `Email`
           , `sn`.`ssn_TimeIn` AS `TimeIn`
           , `sn`.`ssn_TimeOut` AS `TimeOut`
           , `sn`.`ssn_Day` AS `sessionDay`
           , `pl`.`pln_Day` AS `planDay`
           , `sn`.`ssn_Paid` AS `Paid`
      , ABS(`sn`.`ssn_Day`-`pln_Day`) AS `totalDay`
      FROM `session` `sn`
      JOIN `member` `mm` ON
                (`mm`.`mem_id` = `sn`.`mem_id`)
      JOIN `trainer` `tr` ON
                (`tr`.`trn_id` = `sn`.`trn_id`)
      JOIN `plan` `pl` ON
                (`pl`.`pln_id` = `sn`.`pln_id`);
            

//Insert Data in gymacc Table 
INSERT INTO `gymacc` (`unique_id`, `username`, `password`, `roles`) VALUES
('admin', 'admin', '123', 'admin'),
('admin1', 'admin1', '123', 'member'),
('member', 'member', '123', 'member'),
('member1', 'member1', '123', 'member'),
('trainer', 'trainer', '123', 'trainer'),
('trainer1', 'trainer1', '123', 'trainer');

//Insert Data in Member Table
INSERT INTO `member` (`unique_id`, `mem_id`, `mem_FirstName`, `mem_MiddleName`, `mem_LastName`, `mem_Gender`, `mem_ContactNum`, `mem_Address`, `mem_Email`, `mem_Height`, `mem_Weight`, `mem_Birthdate`, `mem_JoinedDate`) VALUES
('member', 'member', 'Jenica', 'Angeles', 'Monis', 'Female', '09994530790', '1640 K Int. 4 Zamora St. Paco, Manila', 'ohheyitsjenica@gmail.com', 155, 51, '2001-04-14', '2022-04-27'),
('member1', 'member1', 'Mika', 'Antonella', 'Francisco', 'Female', '09324677865', 'Tondo, Manila', 'mika_antonellaf@gmail.com', 153, 55, '2001-03-22', '2022-05-10');

//Insert Data in Trainer Table
INSERT INTO `trainer` (`unique_id`, `trn_id`, `trn_FirstName`, `trn_MiddleName`, `trn_LastName`, `trn_Gender`, `trn_ContactNum`, `trn_Address`, `trn_Height`, `trn_Weight`, `trn_Birthdate`) VALUES
('trainer', 'trainer', 'Robert', 'Bert', 'Valenzuela', 'Male', '098765432344', 'San Andres, Manila', 160, 65, '2001-07-24'),
('trainer1', 'trainer1', 'Michael', 'Bitoy', 'Espinosa', 'Male', '09248347312', 'Tondo, Manila', 160, 70, '2001-02-28');

//Insert Data in Plan Table
INSERT INTO `plan` (`pln_id`, `pln_Name`, `pln_Description`, `pln_Day`, `pln_Price`) VALUES
('plan', 'Sweat', 'Sweaty Summer', 30, 50),
('plan03', 'Newbie’s Promo', 'Getting Started Starter Pack', 7, 50),
('plan04', 'Athletes Pack', 'For active athletes only', 14, 50),
('plan05', 'WORKIT Anniversary Promo', 'Good for One month, free use of gym, once a week only with a maximum of 10 body builders,  per 3 hrs.', 4, 50),
('plan06', 'Heavy Launch', 'This promo is only available for those people that has a BMI of 25.0 and above.', 7, 50),
('plan07', 'Tough Students', 'This promo is only available for those students that is 18 years old and above.', 7, 50),
('plan08', 'Muscle Buzz', 'This promo is only available to those body builders, who want to work out for a whole month', 30, 50),
('plan09', 'Holiday Promo', 'This promo is only available from Dec 21 to Dec 31 (Exemption Date: Dec 24 and 25)', 5, 50),
('plan1', 'Fit', 'Upper Body', 25, 400),
('plan10', 'Weekly Promo', 'Going to gym on 5 consecutive days, you will get free 4hrs. This is only available per week.', 1, 50),
('plan11', 'New Years Break', 'This is only available every January 1 to 7 ', 7, 50);
