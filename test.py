import time
import serial     
import datetime     
import urllib.request
from urllib.request import urlopen
ser = serial.Serial("/dev/ttyS2", 9600, timeout=1)

                
while True :
  try :
    x = ser.readline().decode("Ascii")
    x.replace('\\n', '')
    x.replace('\\r', '')
    x.strip()
    print(x)
      


  except :
    print("Error reading...")
