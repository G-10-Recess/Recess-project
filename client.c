#include <stdio.h>
#include <stdlib.h>
//connect to socket api
#include <sys/types.h>
#include <sys/socket.h>
//store address info
#include <netinet/in.h>
#include <unistd.h>
#include <arpa/inet.h>
#include <netdb.h>
#include <string.h>
#include "index.c"

int main(int argc, char *argv[]){

//create a socket
int client_socket;
client_socket = socket(AF_INET, SOCK_STREAM, 0);

//0 for default protocol, AF_INET for internet socket domain, 
//sock_stream meaning its a tcp connection socket.

//specify an address for the socket
struct sockaddr_in serv;
serv.sin_family = AF_INET;
serv.sin_port = htons(9002);
serv.sin_addr.s_addr = INADDR_ANY;

int connection_status  = connect(netSocket, (struct sockaddr *)&server_address, sizeof(server_address));
if(connection_status == -1)
{
printf("There was a problem with the remote server");
}
char server_response[256];
recv(netSocket, &server_response, sizeof(server_response),0);

//print the data we receive from server
printf("The server sent the data: %s\n", server_response);
//close socket
close(netSocket);
return 0;
}
