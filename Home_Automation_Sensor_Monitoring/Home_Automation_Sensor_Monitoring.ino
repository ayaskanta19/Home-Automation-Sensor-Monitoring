#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "/*<WiFi SSID>*/"; const char* password = "/*<WiFi Password>*/"; const int a = 0, b = 4, c = 5;

void setup() {
  
  // put your setup code here, to run once:
  
  pinMode(a, OUTPUT); pinMode(b, OUTPUT); pinMode(c, OUTPUT); WiFi.begin(ssid, password); Serial.begin(115200); while(WiFi.status() != WL_CONNECTED) {  Serial.println("Connecting..."); delay(1000); }
  
}

void loop() {
  
  // put your main code here, to run repeatedly:

  if(WiFi.status() == WL_CONNECTED) {

    HTTPClient httpClient; WiFiClient wifiClient; String data = "/*<URL of sensor_data_write.php>?data=*/" + String(analogRead(A0), DEC); httpClient.begin(wifiClient, data); Serial.println(data);

    int httpCode = httpClient.GET(); String response = ""; if(httpCode > 0) response = httpClient.getString(); else Serial.println(httpCode); httpClient.end();

    httpClient.begin(wifiClient, "/*<URL of remote_data_read.php>*/"); httpCode = httpClient.GET(); response = "";

    if(httpCode > 0) {

      response = httpClient.getString(); Serial.println(response);

      if(response[0] == 1) digitalWrite(a, HIGH); else digitalWrite(a, LOW);
      if(response[1] == 1) digitalWrite(b, HIGH); else digitalWrite(b, LOW);
      if(response[2] == 1) digitalWrite(c, HIGH); else digitalWrite(c, LOW);
      
    }

    else Serial.println(httpCode); httpClient.end(); delay(1000);
    
  }
  
}