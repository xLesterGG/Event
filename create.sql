CREATE SCHEMA OpenChat;

USE OpenChat;

CREATE TABLE Events(
	EventID INT UNSIGNED NOT NULL,
	EventName VARCHAR(30) NOT NULL,
	EventDesc VARCHAR(70) NOT NULL,
	EventLocation VARCHAR(30) NOT NULL,
	PRIMARY KEY (EventID)

);

CREATE TABLE Messages(
	EventID INT UNSIGNED NOT NULL,
	MessageID INT UNSIGNED NOT NULL,
	NickName VARCHAR(15) NOT NULL,	
	Message VARCHAR(50) NOT NULL,
	MessageTime VARCHAR(50) NOT NULL,
	PRIMARY KEY(EventID,MessageID),
	FOREIGN KEY(EventID) REFERENCES Events(EventID)

);

CREATE TABLE Activities(
	EventID INT UNSIGNED NOT NULL,
	ActivityID INT UNSIGNED NOT NULL,
	ActivityName VARCHAR(50) NOT NULL,
	ActivityLocation VARCHAR(50) NOT NULL,
	ActivityDescription VARCHAR(70) NOT NULL,
	ActivityDate VARCHAR(100) NOT NULL,
	StartTime VARCHAR(100) NOT NULL,
	EndTime VARCHAR(100) NOT NULL,
	PRIMARY KEY(EventID,ActivityID),
	FOREIGN KEY(EventID) REFERENCES Events(EventID)

);

INSERT INTO Events VALUES(1,"Swinburne Open Day","Open day for interested people", "Swinburne Sarawak");

INSERT INTO Messages VALUES(1,1,"Lessy","Hi","4:03PM on 05/08/2016");
INSERT INTO Messages VALUES(1,2,"Lessy","Hello","4:03PM on 05/08/2016");

