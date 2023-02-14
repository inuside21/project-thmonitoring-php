import time
import serial     
import datetime     
import urllib.request
from urllib.request import urlopen
ser = serial.Serial("/dev/ttyUSB0", 9600, timeout=1)

                
while True :
  try :
    x = ser.readline().decode("Ascii")
    x.replace('\\n', '')
    x.replace('\\r', '')
    x.strip()
    if (x != "") :
      # main device
      target_url = "http://localhost/thserver/server/api.php?mode=dupdatedevice&dval=" + x
      request = urllib.request.Request(target_url)
      response = urllib.request.urlopen(request)
      deviceId = response.read().decode('utf-8').split(',')

      # update hosting
      target_url = "https://martorenzo.click/project/th/server/api.php?mode=dupdatehost&did=" + deviceId[0] + "&dval=" + x
      request = urllib.request.Request(target_url)
      response = urllib.request.urlopen(request)        

      # sync device from hosting
      


  except :
    print("Error reading...")
