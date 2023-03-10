import time 
import datetime     
import urllib.request
from urllib.request import urlopen


                
while True :
  time.sleep(1)
  try :
    # get device id
    target_url = "http://localhost/thserver/server/api.php?mode=devviewid"
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request)
    deviceId = response.read().decode('utf-8')

    # get device data from hosting
    target_url = "https://web-based-monthy.com/server/api.php?mode=devviewdata&did=3"
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request)        
    deviceData = response.read().decode('utf-8')
    print(deviceData)

    time.sleep(1)

    # save device data to server
    target_url = "http://localhost/thserver/server/api.php?mode=devedit&ddat=" + str(deviceData)
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request)
    deviceData = response.read().decode('utf-8')
    print(deviceData)
  except Exception as e: print(e)
