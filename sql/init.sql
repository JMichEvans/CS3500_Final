/*************************************************************************
 *
 * init.sql
 *
 * This initializes the database for the CS3500 final with tables 'Users',
 * 'Forums', 'Threads', and 'Comments', and populates each with test data.
 * 
 ************************************************************************/

/*************************************************************************
 *
 * Dev notes
 *
 ************************************************************************/

CREATE DATABASE IF NOT EXISTS `martialboards_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `martialboards_db`;

/*************************************************************************
 *
 * Table Initiation
 *
 ************************************************************************/

/* Table: 'Users' */
CREATE TABLE IF NOT EXISTS Users (
    User_ID int(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Username varchar(128) NOT NULL UNIQUE,
    Email varchar(128) NOT NULL UNIQUE,
    Pwd varchar(128) NOT NULL,
    User_Icon varchar(128) NOT NULL DEFAULT '../img/user_img/defaults/default_icon.png', /* path to img ; if no value entered, default */
    User_Type varchar(20) NOT NULL
);

/* Table: 'Threads' */
CREATE TABLE IF NOT EXISTS Threads (
    Thread_ID int (50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Thread_Name varchar(128) NOT NULL,
    Thread_Author varchar(128) NOT NULL, /* pull from Users.Username */
    Thread_Picture varchar(128) NOT NULL, /* pull from Users.User_Icon */
    Thread_Likes int(50) NOT NULL DEFAULT 0
);

/* Table: 'Comments' */
CREATE TABLE IF NOT EXISTS Comments (
    Comment_ID int (50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Comment_Author varchar(128) NOT NULL, /* pull from Users.Username */
    Comment_Picture varchar(128) NOT NULL,
	Comment_Text varchar(200) NOT NULL,
    Comment_Likes int(50) NOT NULL DEFAULT 0,
    Thread_Name varchar(128) NOT NULL /* Pull from Threads.Thread_Name */
);

/*************************************************************************
*
* Fill with Dummy Data
*
************************************************************************/

INSERT INTO Users(Username, Email, Password, User_Icon, User_Type) VALUES
('JMichEvans', 'jeremymichevans@gmail.com', 'testpassword1', '../img/user_img/JMichEvans/Ensolace2_GraphicMainINverted.png'),
('Jake_Adkisson', 'jacob.r.adkisson@wmich.edu', 'testpassword2', '../img/user_img/defaults/default_icon.png');

   
