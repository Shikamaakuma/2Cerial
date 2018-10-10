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

#define     PIN_MODE_INPUT              0
#define     PIN_MODE_OUTPUT             1

int main ( int argc, char **argv ) {
    int air_quality = 0;
    char webPage[1000] = "http://2cerials.m2e-demo.ch/file_writer.php";
    int postsize = 33;
    char toPost[postsize];
    char type[10];
    char standort[200];
    int start = 1;          //prevents the issue of first value after booting beeing 0
  
    
    int i2c_adresse = wiringPiI2CSetup(GROVEPI_I2C_ADDRESS);
    grove_set_pin_mode(i2c_adresse, AIR_QUALITY_ANALOG_PORT,PIN_MODE_INPUT);
    
    
    
    while(1){
        air_quality = get_air_quality_values(i2c_adresse, AIR_QUALITY_ANALOG_PORT);
        sleep(1);
        
        if(start !=1){
            /*
             *Give your Raspberry Pi a name 
             */ 
            strcpy(standort,"winterthurZHAW\0");

            //posting air quality (coming soon)
            sprintf(toPost,"%d",air_quality);
            strcpy(type, "airqual\0");
            //sends the air quality to our webpage
            postToWeb(webPage, standort, type, toPost);
            sleep(1);
            
        }
        else start = 0;
         
        //determines all how many seconds data is being sent
        sleep(5);
    }
    
}