#include "bmp280.h"

#define     BMP280_TRIMMING_REGISTER    0x88
#define     BMP280_CM_REGISTER          0xF4
#define     BMP280_CONF_REGISTER        0xF5
#define     BMP280_DATA_REGISTER        0xF7
#define     BMP280_CM_VALUE             0x27
#define     BMP280_CONF_VALUE           0xA0

typedef struct bmp280_trimming{
    uint16_t    dig_T1;
    int16_t     dig_T2;
    int16_t     dig_T3;
    uint16_t    dig_P1;
    int16_t     dig_P2;
    int16_t     dig_P3;
    int16_t     dig_P4;
    int16_t     dig_P5;
    int16_t     dig_P6;
    int16_t     dig_P7;
    int16_t     dig_P8;
    int16_t     dig_P9;
} bmp280_trimming;

static float convert_bmp280_data_to_pressure(bmp280_trimming trimming, uint8_t *temp_pressure_data);
static bmp280_trimming get_bmp280_trimming_parameter(int i2c_handler);

float get_bmp280_value(int i2c_handler){
    
    bmp280_trimming trimming = get_bmp280_trimming_parameter(i2c_handler);
    const int SIZE = 2;
    const int ARRAY_SIZE = 8; 
    
    uint8_t data_CM[] = {BMP280_CM_REGISTER, BMP280_CM_VALUE};
    uint8_t data_CONF[] = {BMP280_CONF_REGISTER, BMP280_CONF_VALUE};
    
    wiringPiI2CWriteBlock(i2c_handler, SIZE, data_CM);
    wiringPiI2CWriteBlock(i2c_handler, SIZE, data_CONF);
    
    uint8_t data_array[ARRAY_SIZE];
    wiringPiI2CReadBlock(i2c_handler, ARRAY_SIZE, BMP280_DATA_REGISTER, data_array);
    
    float retValue = convert_bmp280_data_to_pressure(trimming, data_array);
    return retValue;
}


static bmp280_trimming get_bmp280_trimming_parameter(int i2c_handler){
    int size = 24;
    uint8_t read_data[size];
    bmp280_trimming trimming;

    if(wiringPiI2CReadBlock(i2c_handler, size, BMP280_TRIMMING_REGISTER, read_data) < 0){
        printf("Error reading I2C\n");
    }

    trimming.dig_T1 = (read_data[1] << 8) | read_data[0];
    trimming.dig_T2 = (read_data[3] << 8) | read_data[2];
    trimming.dig_T3 = (read_data[5] << 8) | read_data[4];

    trimming.dig_P1 = (read_data[7] << 8) | read_data[6];
    trimming.dig_P2 = (read_data[9] << 8) | read_data[8];
    trimming.dig_P3 = (read_data[11] << 8) | read_data[10];
    trimming.dig_P4 = (read_data[13] << 8) | read_data[12];
    trimming.dig_P5 = (read_data[15] << 8) | read_data[14];
    trimming.dig_P6 = (read_data[17] << 8) | read_data[16];
    trimming.dig_P7 = (read_data[19] << 8) | read_data[18];
    trimming.dig_P8 = (read_data[21] << 8) | read_data[20];
    trimming.dig_P9 = (read_data[23] << 8) | read_data[22];

    return trimming;
}


static float convert_bmp280_data_to_pressure(bmp280_trimming trimming, uint8_t *temp_pressure_data){
    // Convert pressure and temperature data to 19-bits
    int adc_p = ((temp_pressure_data[0] << 16) | (temp_pressure_data[1] << 8) | (temp_pressure_data[2] & 0xF0)) >> 4;
    int adc_t = ((temp_pressure_data[3] << 16) | (temp_pressure_data[4] << 8) | (temp_pressure_data[5] & 0xF0)) >> 4;

    // Temperature offset calculations
    float var_1 = ((adc_t >> 14) - (trimming.dig_T1 >> 10)) * trimming.dig_T2;
    float var_temp = ((adc_t >> 17) - (trimming.dig_T1 >> 13));
    float var_2 = var_temp * var_temp * trimming.dig_T3;
    float t_fine = var_1 + var_2;

    // Pressure offset calculations
    var_1 = (t_fine / 2.0) - 64000.0;
    var_2 = (var_1 * var_1 * trimming.dig_P6) / 32768.0;
    var_2 = var_2 + var_1 * trimming.dig_P5 * 2.0;
    var_2 = (var_2 / 4.0) + (trimming.dig_P4 * 65536.0);
    var_1 = (trimming.dig_P3 * var_1 * var_1 / 524288.0 + trimming.dig_P2 * var_1) / 524288.0;
    var_1 = (1.0 + var_1 / 32768.0) * (trimming.dig_P1);
    float p = 1048576.0 - adc_p;
    p = (p - (var_2 / 4096.0)) * 6250.0 / var_1;
    var_1 = trimming.dig_P9 * p * p / 2147483648.0;
    var_2 = p * trimming.dig_P8 / 32768.0;

    float pressure = (p + (var_1 + var_2 + trimming.dig_P7) / 16.0) / 100;

    return pressure;
}
