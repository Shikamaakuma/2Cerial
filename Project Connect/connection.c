/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * File:   main.c
 * Author: Shikamaakuma
 *
 * Created on 19 September 2018, 14:22
 */

//TODO change toPost input to float and change code accordingly

#include <stdio.h>
#include <stdlib.h>
#include <curl/curl.h>
#include <string.h>

int post_to_web(char *webpage, char *macAddr, char *pw, char *temperature, char *airPressure, char *airQuality, char *humidity) {

    CURL *curl;
    CURLcode res;
    char toPost[2000];
    //constructs whole string that should be posted
    sprintf(toPost, "macAddr=%s&pw=%s&temperature=%s&airPressure=%s&airQuality=%s&humidity=%s", macAddr, pw, temperature, airPressure, airQuality, humidity);
    printf("%s \n", toPost);

    //initializes most things like socket and protocols
    curl_global_init(CURL_GLOBAL_ALL);
    //starts a libcurl session with curl as handle
    curl = curl_easy_init();

    //if it could create a session -> needs exception catcher
    if (curl) {

        //sets the webpage and what to post for curl 
        curl_easy_setopt(curl, CURLOPT_URL, webpage);
        curl_easy_setopt(curl, CURLOPT_POSTFIELDS, toPost);

        //posts toPost on website and returns a value depending on if it was successful or not
        res = curl_easy_perform(curl);

        //in case the toPost was not successful
        if (res != CURLE_OK)
            fprintf(stderr, "curl_easy_perform() failed: %s\n",
                curl_easy_strerror(res));

        //kills curl and all associated memories
        curl_easy_cleanup(curl);
    }
    curl_global_cleanup();

    return 0;
}