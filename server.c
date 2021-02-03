#include <stdio.h>
#include <stdlib.h>
#include <netdb.h>
#include <netinet/in.h>
#include <string.h>
#include <unistd.h>
#include <stdbool.h>
#include <time.h>
//#include <mysql.h>
//#include <mysql/mysql.h>
#define MAX_PATIENTS [100]
// typedef struct Patients
// {
//     char patient_name[50];
//     char patient_gender[50];
//     char DOI[100];
//     char officer_name[100];
// } patient;
// patient patients[MAX_PATIENTS];

// add_to_database()
// {
//     char name[50] = "Nicolas";
//     MYSQL *con = mysql_init(NULL);
//     if (con == NULL)
//     {

//         exit(1);
//         printf("impossible");
//     }
//     if (mysql_real_connect(con, "127.0.0.1", "root", "", "testing", 0, NULL, 0) == NULL)
//     {
//         fprintf(stderr, "%s\n", mysql_error(con));
//         printf("connected\n We are connected\n");
//     }
//     FILE *server_file = fopen("server_file.txt", "r");
//     if (server_file == NULL)
//     {
//         puts("\nFiles does not exit\n");
//     }
//     else
//     {
//         char firstName[100];
//         char secondName[100];
//         char server_string[256];
//         char store[200];
//         int index = 0;
//         while (fgets(server_string, 100, server_file) != NULL)
//         {
//             strcpy(store, server_string);
//             sscanf(store, "%s %s %s %s %s", firstName, secondName,
//                    patients[index].DOI, patients[index].patient_gender, patients[index].officer_name);
//             //  printf("Am store: %s\nName:%s%s\n%s", store, firstName, secondName
//             //  ,patients[index].patient_gender);

//             //  strcpy(patients[index].patient_name, firstName);
//             //  strcat(patients[index].patient_name, " ");
//             //  strcat(patients[index].patient_name, secondName);
//             printf("PatientName: %s \nGender:%s \nOfficerName:%s \nDate:%s\n",patients[index].patient_name, 
// 			// patients[index].patient_gender, 
// 			// patients[index].officer_name,
// 			// patients[index].DOI);
//             char statement[200];
// 	char name1[20] = "Brian";
// 	snprintf(statement, 300, "INSERT INTO patients(patient_name) VALUES('%s')", name1);
	
//             if (mysql_query(con, statement)) 
// 	{
//                 //finish_with_error(con);
//                 printf("inserted");
// 	}
// 			index++;
//         }
//     }
//     mysql_close(con);
//     exit(0);
// }
#include <stdio.h>

void bzero(void *a, size_t n)
{
    memset(a, 0, n);
}

void bcopy(const void *src, void *dest, size_t n)
{
    memmove(dest, src, n);
}

struct sockaddr_in *init_sockaddr_in(uint16_t port_number)
{
    struct sockaddr_in *socket_address = malloc(sizeof(struct sockaddr_in));
    memset(socket_address, 0, sizeof(*socket_address));
    socket_address->sin_family = AF_INET;
    socket_address->sin_addr.s_addr = htonl(INADDR_ANY);
    socket_address->sin_port = htons(port_number);
    return socket_address;
}

char *process_operation(char *input)
{
    size_t n = strlen(input) * sizeof(char);
    char *output = malloc(n);
    memcpy(output, input, n);
    return output;
}

int main(int argc, char *argv[])
{
    FILE *server_file = fopen("server_file.txt", "a+");

    const uint16_t port_number = 3000;
    int server_fd = socket(AF_INET, SOCK_STREAM, 0);

    struct sockaddr_in *server_sockaddr = init_sockaddr_in(port_number);
    struct sockaddr_in *client_sockaddr = malloc(sizeof(struct sockaddr_in));
    socklen_t server_socklen = sizeof(*server_sockaddr);
    socklen_t client_socklen = sizeof(*client_sockaddr);

    if (bind(server_fd, (const struct sockaddr *)server_sockaddr, server_socklen) < 0)
    {
        printf("Error! Bind has failed\n");
        exit(0);
    }
    if (listen(server_fd, 3) < 0)
    {
        printf("Error! Can't listen\n");
        exit(0);
    }

    //variable buffer to store strings receiver over the network
    const size_t buffer_len = 256;
    //memory allocation.
    char *buffer = malloc(buffer_len * sizeof(char));
    //char *line= malloc(buffer_len * sizeof(char));
    char *response = NULL;
    time_t last_operation;
    __pid_t pid = -1;

    //Run forever
    while (1)
    {

        int client_fd = accept(server_fd, (struct sockaddr *)&client_sockaddr,
                               &client_socklen);

        pid = fork();

        if (pid == 0)
        {
            close(server_fd);

            if (client_fd == -1)
            {
                exit(0);
            }

            printf("\nConnection with `%d` has been established and delegated to the process %d.\nWaiting for a query...\n", client_fd, getpid());

            last_operation = clock();

            while (1)
            {
                read(client_fd, buffer, buffer_len);
                //printf("Name:%d", re);
                if (!strcmp(buffer, "close"))
                {
                    printf("Process %d: ", getpid());
                    close(client_fd);
                    printf("Closing session with `%d`. Bye!\n", client_fd);
                    break;
                }

                if (strlen(buffer) == 0)
                {
                    clock_t d = clock() - last_operation;
                    double dif = 5.0 * d / CLOCKS_PER_SEC;

                    if (dif > 1.0)
                    {
                        printf("Process %d: ", getpid());
                        close(client_fd);
                        printf("Connection timed out after %.3lf seconds. ", dif);
                        printf("Closing session with `%d`. Bye!\n", client_fd);
                        break;
                    }

                    continue;
                }
                printf("%s", buffer);
                fprintf(server_file, buffer);
                //call from here mysql stuff;
                //add_to_database();
                free(response);

                response = process_operation(buffer);
                printf("%s", response);
                bzero(buffer, buffer_len * sizeof(char));

                send(client_fd, "file received successsfully", strlen(response), 0);

                //printf("Responded with `%s`. Waiting for a new query...\n", response);

                last_operation = clock();
            }
            exit(0);
        }
        else
        {
            close(client_fd);
        }
    }
}
