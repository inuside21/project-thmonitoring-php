#!/usr/bin/env python

import os
import sys
import serial
from time import sleep

if len(sys.argv) > 1:
  output = sys.argv[1]
else:
  output = "no argument found"

with open('readme.txt', 'w') as f:
  f.write(output)