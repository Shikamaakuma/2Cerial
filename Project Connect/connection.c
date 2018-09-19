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

#include <stdio.h>
#include <stdlib.h>
#include <curl.h>
 
int postToWeb(char[] webpage, char[] toPost){
    CURL *curl;
    CURLcode res; 
    
    curl_global_init(CURL_GLOBAL_ALL);
    
    curl = curl_easy_init();
    
    if(curl) {

        curl_easy_setopt(curl, CURLOPT_URL, );
        
        curl_easy_setopt(curl, CURLOPT_URL, webpage);
        curl_easy_setopt(curl, CURLOPT_POSTFIELDS, toPost);
 
 
        res = curl_easy_perform(curl);


        if(res != CURLE_OK)
            fprintf(stderr, "curl_easy_perform() failed: %s\n",
                curl_easy_strerror(res));
 

        curl_easy_cleanup(curl);
    }
    curl_global_cleanup();
    return 0;
}