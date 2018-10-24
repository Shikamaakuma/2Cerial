#include <stdio.h>
#include <stdlib.h>
#include <curl/curl.h>

int post_to_web(char *webpage, char *macAddr, char *pw, char *temperature, char *airPressure, char *airQuality, char *humidity);