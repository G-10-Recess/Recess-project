#include <stdio.h>
#include <stdlib.h>
//connect to socket api
#include <sys/types.h>
#include <sys/socket.h>
//store address info
#include <netinet/in.h>

#include <unistd.h>

int main(){
char server_message[256] = "You have reached the server!";
//create socket
int server_socket;
server_socket = socket(AF_INET, SOCK_STREAM, 0);
if(server_socket == -1)
{
printf("Could not create socket");
}
puts("Socket Created.👍️");

//define server address
struct sockaddr_in server_address;
server_address.sin_family = AF_INET;
server_address.sin_port = htons(9002);
server_address.sin_addr.s_addr = INADDR_ANY;

//bind the socket to the specified ip and port
bind(server_socket, (struct sockaddr *)&server_address, sizeof(server_address));

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
