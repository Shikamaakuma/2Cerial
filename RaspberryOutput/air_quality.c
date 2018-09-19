#include "air_quality.h"

// Returns the air quality value
// Value > 700 = High pollution
// 700 > Value > 300 = Low pollution
// Value < 300 = Air fresh
int get_air_quality_values(int i2c_handler, uint8_t device_port){ 
    uint16_t value = grove_read_analog(i2c_handler, device_port);
    return value;
}
