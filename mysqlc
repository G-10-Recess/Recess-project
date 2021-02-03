#include <mysql.h>
//#include <mysql/mysql.h>
#include <stdio.h>
//#include <stdlib.h>

#include<string.h>
#define MAX_PATIENTS 100
// void finish_with_error(MYSQL *con)
// {
// 	fprintf(stderr, "%s\n", mysql_error(con));
// 	mysql_close(con);
// 	exit(1);
// }
typedef struct Patients
{
    char patient_name[50];
    char patient_gender[50];
    char DOI[100];
	char officer_name[100];
} patient;
patient patients[MAX_PATIENTS];
//file
FILE*server_file;
void send_to_db(){
	 server_file = fopen("server_file.txt", "r");
    if (server_file == NULL)
    {
        puts("\nFiles does not exit\n");

    }
    else
    {
         char firstName[100];
		 char secondName[100];
		 char server_string[256];
		 char store[200];
		 int index =0;
        while (fgets(server_string, 100, server_file) != NULL)
        {
			strcpy(store,server_string);
			sscanf(store, "%s %s %s %s %s", firstName, secondName,
			 patients[index].DOI,patients[index].patient_gender, patients[index].officer_name);
			//  printf("Am store: %s\nName:%s%s\n%s", store, firstName, secondName
			//  ,patients[index].patient_gender);

			 strcpy(patients[index].patient_name, firstName);
			 strcat(patients[index].patient_name, " ");
			 strcat(patients[index].patient_name, secondName);
			printf("PatientName: %s \nGender:%s \nOfficerName:%s \nDate:%s\n",patients[index].patient_name, 
			patients[index].patient_gender, 
			patients[index].officer_name,
			patients[index].DOI);
			index++;

        }

    }
}
int main(int argc, char **argv)
{
	 send_to_db();
	 char name[50] = "Nicolas";
	MYSQL *con = mysql_init(NULL);
	if (con == NULL)
	{

		exit(1);
		printf("impossible");
	}
    char statement[200];
	char name1[20];
	strcpy(name1, patients[0].patient_name);
	snprintf(statement, 300, "INSERT INTO patients(patient_name) VALUES('%s')", name1);
	if (mysql_real_connect(con,"127.0.0.1", "root", "", "testing", 0,NULL,0)==NULL)
	{
				fprintf(stderr, "%s\n", mysql_error(con));
		printf("connected\n We are connected\n");
	}

	//if (mysql_query(con, "DROP TABLE IF EXISTS cars")) 
	//{
		//finish_with_error(con);
	//}
	
	//if (mysql_query(con, "CREATE TABLE 'testdb'.'cars' ('id' INT PRIMARY KEY AUTO_INCREMENT, 'name' VARCHAR(255)"))
	//{
	//	finish_with_error(con);
	//}ee
	
	
	if (mysql_query(con, statement)) 
	{
		//finish_with_error(con);
		printf("inserted");
	}
	//else{
		//fprintf(stderr, "%s\n", mysql_error(con));
		//printf("Problem with insertung");
	//}
	
	/*
	if (mysql_query(con, "INSERT INTO cars VALUES(2,'Mercedes',57127)")) 
	{
		finish_with_error(con);
	}
	
	if (mysql_query(con, "INSERT INTO cars VALUES(3,'Skoda',9000)")) 
	{
		finish_with_error(con);
	}
	
	if (mysql_query(con, "INSERT INTO cars VALUES(4,'Volvo',29000)")) 
	{
		finish_with_error(con);
	}
	
	if (mysql_query(con, "INSERT INTO cars VALUES(5,'Bentley',350000)")) 
	{
		finish_with_error(con);
	}
	
	if (mysql_query(con, "INSERT INTO cars VALUES(6,'Citroen',21000)")) 
	{
		finish_with_error(con);
	}
	
	if (mysql_query(con, "INSERT INTO cars VALUES(7,'Hummer',41400)")) 
	{
		finish_with_error(con);
	}

	if (mysql_query(con, "INSERT INTO cars VALUES(8,'Volkswagen',21600)")) 
	{
		finish_with_error(con);
	}
	88*/
	mysql_close(con);
	exit(0);
}
