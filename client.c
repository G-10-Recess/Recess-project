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

int client_socket;
//specify an address for the socket
struct sockaddr_in serv;
serv.sin_family = AF_INET;
serv.sin_port = htons(9002);
serv.sin_addr.s_addr = INADDR_ANY;
 //create a socket
client_socket = socket(AF_INET, SOCK_STREAM, 0);
//0 for default protocol, AF_INET for internet socket domain, 
//sock_stream meaning its a tcp connection socket.

  inet_pton(AF_INET, "127.0.0.1", &serv.sin_addr);
  
int connection_status  = connect(client_socket, (struct sockaddr *)&server_address, sizeof(serv));
if(connection_status == -1)
{
printf("There was a problem with the remote server");
}
printf("--[+]- COVID-19 CASE MANAGEMENT AND REPORTING TOOL FOR UGANDA -[+]--\n\n");
  


 //close socket
close(netSocket);
return 0;
}
