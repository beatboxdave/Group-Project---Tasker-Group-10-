--------------------------------------------------------------------------------------------------------
		    TaskerMAN Group-10 CS22120 Software Development Lifecycle
--------------------------------------------------------------------------------------------------------

dbconfig.php
*******************************************************************************************************

This file contains the database connection settings for the Database, including Database location,
username and password and database name. The file is included in the other pages for the variable 
names to be used. 

index.php
********************************************************************************************************

This is the main index file of the website that contains all of the content and functionality,
using a tabs based system to navigate the different functions of the website. Four tabs are included:

	Home- This acts as the log in page and logout page that displays the user that is logged in.
	
	Member- This is where the user can add in new members, and edit the state of the current users.

	Add task- This task is dedicated to the addition of new tasks by the user. Using the simple
		  form provided

	Edit task- The final tab displays all of the tasks, and allows the user to update and delete
		   the task data.
--------------------------------------------------------------------------------------------------------

Installation
*******************************************************************************************************

Use the taskerCLI-installer.sh script provided, and enter in a valid absolute file path to copy the contents to where
you require.

OR

The website can be used by placing the contents of the src folder directory into the root folder of the 
intended server, the index.php file is named so that the page will load by default. No configuration of
the database settings is required by the user as this is set in the dbconfig.php file mentioned above.
--------------------------------------------------------------------------------------------------------

Developers
*******************************************************************************************************
*Charles Palmer
*David Kastelik
*Curtis Griffiths

Connor Daldry
Kimit Rai
Marcus Hill
Sean Johansen
