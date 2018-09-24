#include <stdio.h>
#include <wiringPiI2C.h>
#include <unistd.h>
#include <stdint.h>
#include <math.h>
#include "dht.h"
#include "air_quality.h"
#include "bmp280.h"
#include "grovepi.h"
#include <string.h>

#include "connection.h"//TODO actually get the library

#define     DHT_DIGITAL_PORT            4
#define     AIR_QUALITY_ANALOG_PORT     0

#define     BMP280_I2C_ADDRESS          0x77
#define     GROVEPI_I2C_ADDRESS         0x04

#define     PIN_MODE_INPUT              0
#define     PIN_MODE_OUTPUT             1

int main ( int argc, char **argv ) {
    float temp = 0;
    float humidity = 0;
    int air_quality = 0;
    float pressure = 0;
    float fair_quality = 0;
    char webPage[1000] = "http://2cerials.m2e-demo.ch/file_writer.php";
    int postsize = 33;
    char toPost[postsize];
    char type[10];
    char standort[200];
    

    
    int i2c_adresse = wiringPiI2CSetup(GROVEPI_I2C_ADDRESS);
    int bmp_adresse = wiringPiI2CSetup(BMP280_I2C_ADDRESS);
    grove_set_pin_mode(i2c_adresse, AIR_QUALITY_ANALOG_PORT,PIN_MODE_INPUT);
    
    while(1){
        get_dht_values(i2c_adresse, DHT_DIGITAL_PORT, &temp, &humidity);
        sleep(1);
        air_quality = get_air_quality_values(i2c_adresse, AIR_QUALITY_ANALOG_PORT);
        sleep(1);
        pressure = get_bmp280_value(bmp_adresse);
        
        
        //posting temp
        strcpy(standort,"Winterthur\0");
        postsize = 3;
        gcvt(temp, postsize, toPost);
        strcpy(type, "temp\0");
        //sends the temperatur to our webpage
        postToWeb(webPage, standort, type, toPost);
        sleep(1);
       
        //posting air pressure (coming soon)
        strcpy(standort,"Winterthur\0");
        postsize = 4;
        gcvt(pressure, postsize, toPost);
        strcpy(type, "press\0");
        //sends the pressure to our webpage
        postToWeb(webPage, standort, type, toPost);
        sleep(1);
       
        //posting air quality (coming soon)
        strcpy(standort,"Winterthur\0");
        fair_quality = (float)air_quality;
        postsize = 3;
        gcvt(fair_quality, postsize, toPost);
        strcpy(type, "airqual\0");
        //sends the air quality to our webpage
        postToWeb(webPage, standort, type, toPost);
        sleep(1);
        
        //posting humidity (coming soon)
        strcpy(standort,"Winterthur\0");
        postsize = 3;
        gcvt(humidity, postsize, toPost);
        strcpy(type, "h2o\0");
        //sends the humidity to our webpage
        postToWeb(webPage, standort, type, toPost);
        
        
        //determines all how many seconds data is being sent
        sleep(2);
    }
    
}