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

#include "connection.h"

#define     DHT_DIGITAL_PORT            4
#define     AIR_QUALITY_ANALOG_PORT     0

#define     BMP280_I2C_ADDRESS          0x77
#define     GROVEPI_I2C_ADDRESS         0x04

#define     PIN_MODE_INPUT              0
#define     PIN_MODE_OUTPUT             1
#define     PASSWORD                    "Password" //TODO set your own password
#define     URL                         "http://2cerials.m2e-demo.ch/database_writer.php"
#define     POSTSIZE                    33

//opens the file the macAdress is written into

int mac_get_ascii_from_file(char addr[]) {
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

int main(int argc, char **argv) {
    char WEBPAGE[1000] = URL;
    char PW[30] = PASSWORD;
    float temperature = 0;
    float humidity = 0;
    int airQuality = 0;
    float pressure = 0;
    int start = 1;
    char temperatureChar[POSTSIZE];
    char airpressureChar[POSTSIZE];
    char airQualityChar[POSTSIZE];
    char humidityChar[POSTSIZE];
    char macAddr[20];


    int i2c_adresse = wiringPiI2CSetup(GROVEPI_I2C_ADDRESS);
    int bmp_adresse = wiringPiI2CSetup(BMP280_I2C_ADDRESS);
    grove_set_pin_mode(i2c_adresse, AIR_QUALITY_ANALOG_PORT, PIN_MODE_INPUT);

    int macAddrGet = mac_get_ascii_from_file(macAddr);
    printf(macAddr);

    while (1) {

        if (macAddrGet != 1) {
            printf("Error: failed to find macAddr");
            break;
        }

        get_dht_values(i2c_adresse, DHT_DIGITAL_PORT, &temperature, &humidity);
        sleep(2);
        airQuality = get_air_quality_values(i2c_adresse, AIR_QUALITY_ANALOG_PORT);
        sleep(2);
        pressure = get_bmp280_value(bmp_adresse);
        sleep(2);
        
        if (start != 1) {
            
            //converts ints/floats into strings
            sprintf(temperatureChar, "%.1f", temperature);
            sprintf(airpressureChar, "%.0f", pressure);
            sprintf(airQualityChar, "%d", airQuality);
            sprintf(humidityChar, "%.1f", humidity);
            
            //sends Data to our webpage
            post_to_web(WEBPAGE, macAddr, PW, temperatureChar, airpressureChar, airQualityChar, humidityChar);
        } else start = 0;


        //determines all how many seconds data is being sent
        sleep(54);
    }

}