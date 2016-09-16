/*
  Chris Nethercott / ThorinDev
  TemperatureLCD
*/
#include <Wire.h>
#include <LiquidCrystal_I2C.h> 
#include <OneWire.h>
#include <DallasTemperature.h>
#include <LiquidCrystal.h>

LiquidCrystal_I2C lcd(0x27, 16, 2);
OneWire oneWire(6);
DallasTemperature sensors(&oneWire);  
DeviceAddress black = { 0x28, 0xFF, 0x1A, 0xAA, 0x62, 0x15, 0x03, 0x20 }; //Black Address
DeviceAddress red   = { 0x28, 0xFF, 0xA9, 0xB4, 0x62, 0x15, 0x03, 0x0C }; //Red Address
DeviceAddress green = { 0x28, 0xFF, 0xF5, 0xB3, 0x62, 0x15, 0x03, 0x3E }; //Green Address
String FirstLineofLCD = "DGS F24";

void setup() {
  setupSensors();
  lcd.begin();
  lcd.backlight();
}

void setupSensors() {
  sensors.begin();
  sensors.setResolution(black, 10);
  sensors.setResolution(red, 10);
  sensors.setResolution(green, 10);
}

void loop() {
  sensors.requestTemperatures();

  delay(2000);
  lcd.begin(16, 2);
  lcd.print(FirstLineofLCD);
  lcd.setCursor(0, 1);
  lcd.print("Black = " + printTemperature(black));

  delay(2000);
  lcd.clear();
  lcd.print(FirstLineofLCD);
  lcd.setCursor(0, 1);
  lcd.print("Red   = " + printTemperature(red));
  
  delay(2000);
  lcd.clear();
  lcd.print(FirstLineofLCD);
  lcd.setCursor(0, 1);
  lcd.print("Green = " + printTemperature(green));
}

void printTemperature(DeviceAddress deviceAddress) {

  float tempC = sensors.getTempC(deviceAddress);

  if (tempC != -127.00) {
    lcd.print(tempC);
  }
  else {
    lcd.print("Failed");
  }
}
