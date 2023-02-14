import time 
import datetime     
import urllib.request
from urllib.request import urlopen


                
while True :
  try :
    # get device id
    target_url = "http://localhost/thserver/server/api.php?mode=devviewid"
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request)
    deviceId = response.read().decode('utf-8')

    # get device data from hosting
    target_url = "https://martorenzo.click/project/th/server/api.php?mode=devviewdata&did=" + deviceId
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request)        
    deviceData = response.read().decode('utf-8')

    # save device data to server
    target_url = "http://localhost/thserver/server/api.php?mode=devedit&ddat=" + deviceData
    request = urllib.request.Request(target_url)
    response = urllib.request.urlopen(request)

    time.sleep(1)
  except :
    print("Error reading...")
