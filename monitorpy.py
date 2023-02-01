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
      target_url = "http://localhost/thserver/server/api.php?mode=dupdate&dval=" + x
      request = urllib.request.Request(target_url)
      response = urllib.request.urlopen(request)
      deviceId = response.read().decode('utf-8')

      print(deviceId)

      target_url = "https://martorenzo.click/project/th/server/api.php?mode=dupdatehost&did=" + deviceId + "&dval=" + x
      print(target_url)
      request = urllib.request.Request(target_url)
      response = urllib.request.urlopen(request)
  except :
    print("Error reading...")
