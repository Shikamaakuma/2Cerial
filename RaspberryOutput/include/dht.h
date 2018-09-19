#include <stdio.h>
#include <stdint.h>
#include <wiringPiI2C.h>
#include <math.h>
#include "grovepi.h"

void get_dht_values(int i2c_handler, uint8_t device_port, float *temp, float *humidity);
