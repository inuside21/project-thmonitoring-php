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
      response = urllib.request.urlopen(request, timeout=5)
      deviceId = response.read().decode('utf-8').split(',')
      print("OK LOCAL: " + deviceId[0])

      # update hosting
      target_url = "https://web-based-monthy.com/server/api.php?mode=dupdatehost&did=" + deviceId[0] + "&dval=" + x
      request = urllib.request.Request(target_url)
      response = urllib.request.urlopen(request, timeout=5)
      print("OK REMOTE-1")
      time.sleep(1)
    else :
      print("Failed")
  except Exception as e:
    print(e)