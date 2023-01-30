#!/usr/bin/env python

import os
import sys
import serial
from time import sleep

if len(sys.argv) > 1:
  output = sys.argv[1]
  outputIndex = sys.argv[2]
else:
  output = "no argument found"
  outputIndex = "no argument found"

print("python: " + output + " " + outputIndex)