#include <stdio.h>
#include <stdlib.h>
//connect to socket api
#include <sys/types.h>
#include <sys/socket.h>
//store address info
#include <netinet/in.h>
#include <arpa/inet.h>
#include <string.h>
#include <unistd.h>

int main(int argc, char *argv[]){
  
char server_message[256] = "You have reached the server!";
//create socket
int server_socket;
server_socket = socket(AF_INET, SOCK_STREAM, 0);
if(server_socket == -1)
{
printf("Could not create socket");
}
else{puts("Socket Created.👍️");}

//define server address
struct sockaddr_in serv;
serv.sin_family = AF_INET;
serv.sin_port = htons(9002);
serv.sin_addr.s_addr = INADDR_ANY;

//bind the socket to the specified ip and port
bind(server_socket, (struct sockaddr *)&serv, sizeof(serv));

//listening
listen(server_socket, 5);
  
  
int client_socket;
client_socket = accept(server_socket, NULL, NULL);
//send message to client
send(client_socket, server_message, sizeof(server_message), 0);
//close the socket
close(server_socket);
return 0;
}
