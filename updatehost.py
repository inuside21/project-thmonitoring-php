import time 
import datetime     
import urllib.request
from urllib.request import urlopen
import os
import sys

if len(sys.argv) > 0:
  output = sys.argv[1]
  output2 = sys.argv[2]

  # get device data from hosting
  target_url = "https://web-based-monthy.com/server/api.php?mode=dupdatehost2&did=" + output2 + "&dval=" + output
  request = urllib.request.Request(target_url)
  response = urllib.request.urlopen(request, timeout=5)      
  deviceResponse = response.read().decode('utf-8')
  print(deviceResponse)
