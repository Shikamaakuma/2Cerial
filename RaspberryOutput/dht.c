#include "dht.h"

#define     DHT_TEMP_CMD                40
#define     DHT_TYPE                    1
#define     GROVEPI_REGISTER            0x01

static float convert_byte_pack_to_float(uint8_t data_1, uint8_t data_2, uint8_t data_3, uint8_t data_4);

void get_dht_values(int i2c_handler, uint8_t device_port, float *temp, float *humidity){
    grove_write_i2c_cmd(i2c_handler, DHT_TEMP_CMD, device_port, DHT_TYPE, 0);
    const int SIZE = 32;
    uint8_t temp_data[SIZE];
    wiringPiI2CReadBlock(i2c_handler, SIZE, GROVEPI_REGISTER, temp_data);
    *temp = convert_byte_pack_to_float(temp_data[1], temp_data[2], temp_data[3], temp_data[4]);
    *humidity = convert_byte_pack_to_float(temp_data[5], temp_data[6], temp_data[7], temp_data[8]);
}


// Convert 4 bytes to float according to IEEE754
static float convert_byte_pack_to_float(uint8_t data_1, uint8_t data_2, uint8_t data_3, uint8_t data_4) {
    uint32_t raw = (data_4 << 24) | (data_3 << 16) | (data_2 << 8) | data_1;                
    uint32_t sign = raw >> 31;
    uint32_t mantissa = (raw & 0x7FFFFF) | 0x800000;
    int exp = ((raw >> 23) & 0xFF) - 127 - 23;
    float result = mantissa * powf(2.0, exp);

    if(sign){
        result = result * (-1);
    }
    
    return result;
}
