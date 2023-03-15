from RPi.GPIO import GPIO
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setup(7, GPIO.OUT)
GPIO.output(7, GPIO.HIGH)
time.sleep(3)
GPIO.output(7, GPIO.LOW)
GPIO.cleanup()