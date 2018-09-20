#include "grovepi.h"

#define     GROVEPI_REGISTER            0x01
#define     READ_CMD                    3
#define     PIN_MODE_CMD                5
#define     DUMMY_CMD                   1

int grove_write_i2c_cmd(int i2c_handler, uint8_t cmd, uint8_t device_port, uint8_t data_1, uint8_t data_2){   
    uint8_t data_array[]={DUMMY_CMD, cmd, device_port, data_1, data_2};
    const int COMMAND_SIZE = 5;
    wiringPiI2CWriteBlock(i2c_handler, COMMAND_SIZE, data_array);
    return 0;
}

int grove_read_analog(int i2c_handler, uint8_t device_port){
    grove_write_i2c_cmd(i2c_handler, READ_CMD, device_port, 0, 0);
    const int SIZE = 32;
    uint8_t data_array[SIZE];
    wiringPiI2CReadBlock(i2c_handler, SIZE, GROVEPI_REGISTER, data_array);
    uint16_t retValue = (data_array[1]<<8) | data_array[2];
    return retValue;
}

void grove_set_pin_mode(int i2c_handler, uint8_t device_port, uint8_t mode){
    grove_write_i2c_cmd(i2c_handler, PIN_MODE_CMD, device_port, mode, 0);
}
