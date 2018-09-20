#include <stdio.h>
#include <stdint.h>
#include <wiringPiI2C.h>
#include <math.h>
#include "grovepi.h"

float get_bmp280_value(int i2c_handler);
