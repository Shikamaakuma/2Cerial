#include <stdio.h>
#include <wiringPiI2C.h>
#include <unistd.h>
#include <stdint.h>
#include <math.h>
#include "dht.h"
#include "air_quality.h"
#include "bmp280.h"
#include "grovepi.h"

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

    
    int i2c_adresse = wiringPiI2CSetup(GROVEPI_I2C_ADDRESS);
    int bmp_adresse = wiringPiI2CSetup(BMP280_I2C_ADDRESS);
    grove_set_pin_mode(i2c_adresse, AIR_QUALITY_ANALOG_PORT,PIN_MODE_INPUT);
    
    while(1){
        get_dht_values(i2c_adresse, DHT_DIGITAL_PORT, &temp, &humidity);
        sleep(1);
        air_quality = get_air_quality_values(i2c_adresse, AIR_QUALITY_ANALOG_PORT);
        sleep(1);
        pressure = get_bmp280_value(bmp_adresse);
        
        
        //printing all out on console
        printf("temp: \t\t %7.2f\n", temp);
        printf("humidity: \t %7.2f\n", humidity);
        printf("air quality: \t %4.i\n", air_quality);
        printf("air pressure: \t %.2f\n", pressure);
        printf("\n");  
    }
    
}