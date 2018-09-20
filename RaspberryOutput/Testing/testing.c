#include <stdio.h>
#include <stdlib.h>

/*
 * File to Test Codes and stuff
 */
int main(int argc, char** argv) {
    
    float temp = 27.97896785;
    int postsize = 4;
    char toPost[postsize];
    
    gcvt(temp, postsize, toPost);
    printf("resultat für toPost %s \n", toPost);
    //should be 27.98

    return 0;
}

