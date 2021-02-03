#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <netdb.h>
#include <netinet/in.h>
#include <string.h>
#define MAX_PATIENTS 100
int patients_number = 0;
//file
FILE *patient_file;

//structure
typedef struct Patients
{
    char patient_name[50];
    char patient_gender[50];
    char DOI[100];
    char status[100];
} patient;
//officer name
char officer_name[50];
char district_name[30];

//socket globals
int sockfd, portno, n;
struct sockaddr_in serv_addr;
struct hostent *server;
char buffer[256];
portno = 3000;

//create global structure
patient patients[MAX_PATIENTS];

int display_commands()
{
    char commands[5][30] =
        {"1:ADD_PATIENT", "2:ADD_PATIENT_LIST_",
         "3:CHECK_STATUS", "4:ADD_PATIENT_FILE.TXT", "5:SEARCH_CRITERIA"};
    int next_command;
    puts("\n============Lists of Commands=========\n\t");
    for (next_command = 0; next_command < 5; next_command++)
    {
        puts(commands[next_command]);
    }
    int selected_command;
    printf("\nSelectCommand:");
    scanf("%d", &selected_command);
    return selected_command;
}
//patient functions
void add_patient()
{
    //struct
    //set up some condition to stop

    puts("OfficerName");
    scanf("%s", officer_name);
    char stop;
    int loop;
    char firstName[20];
    char secondName[20];
    puts("\t\n=========ENTER_PATIENT_DETAILS===========\n");
    for (loop = patients_number; loop <= MAX_PATIENTS; loop++)
    {
        puts("PatientName");
        //scanf("%s", patients[loop].patient_name);
        scanf("%s%s", firstName , secondName);
        strcpy(patients[loop].patient_name, firstName);
        strcat(patients[loop].patient_name, "  ");
        strcat(patients[loop].patient_name, secondName);
        puts("PatientGender");
        scanf("%s", patients[loop].patient_gender);
        puts("Date:forexample 01/25/2021 or 01-25-2021");
        scanf("%s", patients[loop].DOI);
        puts("Asymptomatic/NotAsymptomatic");
        scanf("%s", patients[loop].status);
        patients_number += 1;
        puts("More patients y/n?");
        scanf(" %c", &stop,1);
        if (stop == 'n' || stop == 'N')
        {
            break;
        }
        puts("\n========NEXT_PATIENT========\n");
    }
}
//patient_list
void add_patient_list()
{
    if (patients_number == 0)
    {
        printf("\nAlert !! no patients yet !!\n");
        get_command(display_commands());
    }
    else
    {
        patient_file = fopen("patient_file.txt", "a+");
        //loop
        if (patient_file == NULL)
        {
            printf("\nFile not found We are sorry\n");
        }
        else
        {
            //loop
            int i;
            for (i = 0; i < patients_number; i++)
            {
                fprintf(patient_file, "%-20s\t\t%-15s\t%-2s\t%-5s\n",
                 patients[i].patient_name, 
                patients[i].DOI, patients[i].patient_gender, officer_name);
            }
            printf("\n====== All Patients Added=====\n");
            printf("\n");
            patients_number = 0;
            fclose(patient_file);
        }
    }
}

void check_status()
{
    patient_file = fopen("patient_file.txt", "r");
    if (patient_file == NULL)
    {
        puts("\nFiles does not exit\n");
        get_command(display_commands());
    }
    else
    {
        char store[200];
        int num_of_cases = 0;
        while (fgets(store, 100, patient_file) != NULL)
        {
            num_of_cases++;
        }
        num_of_cases == 1 ? printf("\nThere is %d case stored in the file", num_of_cases)
                          : printf("\nThere are %d cases stored in the file\n", num_of_cases);
    }
}
void search_details()
{
    //date/name
    patient_file = fopen("patient_file.txt", "r");
    char search_name[50];
    printf("Search by name or date(01/01/2021 or 01-01-2021):");
    scanf("%s", search_name);
    char store[200];

    int records = 0;
    int total_records = 0;
    char PatientName[20] = "PatientName";
    char Date[20] = "Date";
    char  Gender[20] = "Gender";

    char OfficerName[20] = "OfficerName";
    printf("\n");
    printf("%-20s\t\t%-15s\t%-2s\t%-5s\n", PatientName, Date, Gender,OfficerName);
    printf("\n");
    while (fgets(store, 100, patient_file) != NULL)
    {
        total_records++;
        if (strstr(store, search_name) != NULL)
        {
            puts(store);
            records++;
        }
    }

    if (records == 0)
        printf("\nNo records found please search well\n");
    else
    {
        int i = 0;
        for (i = 0; i <= total_records; i++)
        {
            if (records == i)
            {
                int get_available = records;
                get_available == 1 ? printf("\n%d record available out of %d\n", get_available, total_records)
                                   : printf("\n%d records available out of %d\n", get_available, total_records);
            }
        }
    }
    printf("\n");
}
void send_patient_file()
{
    int totalLines = 0;
    patient_file = fopen("patient_file.txt", "r");

    if (patient_file == NULL)
    {
        printf("\n=====File does not exist=====");
        get_command(display_commands());
    }
    char store[255];
    if (fgets(store, 100, patient_file) != NULL)
    {
        // create socket and get file descriptor
        sockfd = socket(AF_INET, SOCK_STREAM, 0);
        server = gethostbyname("127.0.0.1");
        if (server == NULL)
        {
            fprintf(stderr, "ERROR, no such host\n");
            exit(0);
            get_command(display_commands());
        }

        bzero((char *)&serv_addr, sizeof(serv_addr));
        serv_addr.sin_family = AF_INET;
        bcopy((char *)server->h_addr, (char *)&serv_addr.sin_addr.s_addr, server->h_length);
        serv_addr.sin_port = htons(portno);
        //connect to server with server address which is set above (serv_addr)

        if (connect(sockfd, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0)
        {
            perror("ERROR while connecting");
            //exit(1);
            get_command(display_commands());
        }
    	FILE *file2 = fopen("patient_file.txt","r+");

        //implement connections
        while (1)
        {
              
            //printf("What do you want to say? ");
            //making sure variable buffer is initiallized to zero.
            bzero(buffer, 256);

            //Input that goes to the server is obtained and stored in buffer.
            //scanf("%s", buffer);
            
            if(fgets(buffer, 255, file2)==NULL){
                fclose(file2);
                remove("patient_file.txt");
                fopen("patient_file.txt", "a+");
                close(sockfd);
                break;
            }
            
            //gets(buffer);
            n = write(sockfd, buffer, strlen(buffer));
            //printf("n:%d", n);
            if (n < 0)
            {
                perror("\n\t======ERROR while writing to socket Try Again======\n\t");
                printf("\n\t=======Try Again or Enter another command========\t\n");
                get_command(display_commands());
            }

            bzero(buffer, 256);
            n = read(sockfd, buffer, 255);

            if (n < 0)
            {
                perror("ERROR while reading from socket");
                exit(1);
                printf("\n\t=======File couldnot be read=======\t\n");
                get_command(display_commands());
            }
            printf("\n=====server replied: %s =======\n", buffer);
            

            if (!bcmp(buffer, "quit", 4))
                break;
        }
    }
    else
    {
        printf("\n\t\t=======Patient File is empty=======\t\t\n");
        get_command(display_commands());
    }
}
//patients functions
//returns a commad
int get_command(int selected_command)
{
    if (selected_command == 1)
    {
        //f
        add_patient();
        printf("\n");
        return 0;
    }
    else if (selected_command == 2)
    {
        add_patient_list();
        printf("\n");
        return 0;
    }
    else if (selected_command == 3)
    {
        check_status();
        printf("\n");
        return 0;
    }
    else if (selected_command == 4)
    {
        //add file
        //connect
        send_patient_file();
        return 0;
    }
    else if (selected_command == 5)
    {
        search_details();
        printf("\n");
    }
    else
    {
        //printf
        //display_commands();
        puts("\nInvalid Command!! Enter a valid Command:\n");
        get_command(display_commands());
    }
    return 0;
}
int main(int argc, char *argv[])
{
    puts("\n\t\t\t=====-COVID 19 MANAGEMENT SOCKET SYSTEM=====\t\t\t\n");
    //fopen("patient_file.txt", "a+");
    printf("Enter district name forexamle Kampala: ");
    //gets(district_name);
    scanf("%s",district_name);
    strcpy(buffer,district_name);
    while (1)
    {
        get_command(display_commands());
        continue;
    }

    return 0;
}
