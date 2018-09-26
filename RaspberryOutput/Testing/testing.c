#include <stdio.h>
#include <stdlib.h>
#include <string.h>
/*
 * File to Test Codes and stuff
 */
int main(int argc, char** argv) {
    
    char *varType = "Winterthur";
    char *value = "temp";
    char *location;
    
    strcat(location, "_");
    strcat(location, varType);
    strcat(location, "=");
    strcat(location, value);
    
    printf("%s", location);

    return 0;
}

