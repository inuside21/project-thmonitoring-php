import time 
import datetime     
import urllib.request
from urllib.request import urlopen
import os

while True :
  time.sleep(1)
  try :
    # get device id
    target_url = "http://localhost/thserver/server/api.php?mode=devviewid"
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request, timeout=5)
    deviceId = response.read().decode('utf-8')
    print("LOCAL OK-1")

    # get device data from hosting
    target_url = "https://web-based-monthy.com/server/api.php?mode=devviewdata&did=" + str(deviceId)
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request, timeout=5)
    deviceData = response.read().decode('utf-8')
    print("REMOTE OK-1")

    # save device data to server
    target_url = "http://localhost/thserver/server/api.php?mode=devedit&ddat=" + str(deviceData)
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request, timeout=5)
    deviceData = response.read().decode('utf-8')
    print("LOCAL OK-2")

    # wifi
    target_url = "http://localhost/thserver/server/api.php?mode=devwifion"
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request, timeout=5)
    print("LOCAL OK-3")

    # wifi
    target_url = "https://web-based-monthy.com/server/api.php?mode=devrestart&id="  + str(deviceId)
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request, timeout=5)
    deviceData = response.read().decode('utf-8')
    if deviceData == "1" :
      os.system("sudo reboot")
  except Exception as e:
    print(e)
    try :
      # wifi
      target_url = "http://localhost/thserver/server/api.php?mode=devwifioff"
      request = urllib.request.Request(target_url)
      response = urllib.request.urlopen(request, timeout=5)
      print("LOCAL OK-4")
    except Exception as e:
      print(e)