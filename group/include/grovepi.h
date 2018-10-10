#include <stdio.h>
#include <stdint.h>
#include <wiringPiI2C.h>
#include <math.h>

int grove_write_i2c_cmd(int i2c_handler, uint8_t cmd, uint8_t device_port, uint8_t data_1, uint8_t data_2);
int grove_read_analog(int i2c_handler, uint8_t device_port);
void grove_set_pin_mode(int i2c_handler, uint8_t device_port, uint8_t mode);
