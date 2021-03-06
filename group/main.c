#include <stdio.h>
#include <wiringPiI2C.h>
#include <unistd.h>
#include <stdint.h>
#include <math.h>
#include "air_quality.h"
#include "grovepi.h"
#include <string.h>

#include "connection.h"//TODO actually get the library

#define     AIR_QUALITY_ANALOG_PORT     0

#define     GROVEPI_I2C_ADDRESS         0x04
#define     PASSWORD_DB                 "somethingsomething"

#define     PIN_MODE_INPUT              0
#define     PIN_MODE_OUTPUT             1

int mac_get_ascii_from_file( char addr[]) {
  FILE *fp;
  int i = 0;
  char c;
  fp = fopen("/sys/class/net/eth0/address", "r");
  if (fp != NULL) {
    while (!feof(fp)) {
      c = fgetc(fp);
      if (c == ':')
        continue;
      if (c == '\n')
        break;
      addr[i++] = c;
    }
    fclose(fp);
    return 1;
  }
  fclose(fp);
  return 0;
}

int main ( int argc, char **argv ) {
    int air_quality = 0;
    char WEBPAGE[1000] = "https://airquality.m2e-demo.ch/AirQuality/write2dbAQ.php";
    int postsize = 33;
    char toPost[postsize];
    char pw[30] = PASSWORD_DB;
    char macAddr[20];
    int start = 1;          //prevents the issue of first value after booting beeing 0
  
    
    int i2c_adresse = wiringPiI2CSetup(GROVEPI_I2C_ADDRESS);
    grove_set_pin_mode(i2c_adresse, AIR_QUALITY_ANALOG_PORT,PIN_MODE_INPUT);
    
    int macAddrGet = mac_get_ascii_from_file(macAddr);
    
    while(1){
        air_quality = get_air_quality_values(i2c_adresse, AIR_QUALITY_ANALOG_PORT);
        sleep(1);
        
        if(mac_get_ascii_from_file(macAddr) !=1){
            printf("Error: failed to find macAddr");
            break;
        }
        
        if(start !=1){
            if(mac_get_ascii_from_file(macAddr) !=1){
                printf("Error: failed to find macAddr");
                break;
            }
            //posting air quality (coming soon)
            sprintf(toPost,"%d",air_quality);
            //sends the air quality to our webpage
            postToWeb(WEBPAGE, macAddr, pw, toPost);
            sleep(1);
            
        }
        else start = 0;
         
        //determines all how many seconds data is being sent
        sleep(5);
    }
    
}
