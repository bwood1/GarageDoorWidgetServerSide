#!/bin/bash

# Our lamps:
#	(These are wiringPi pin numbers)

  led=1

# setup:
#	Program the GPIO correctly and initialise the lamps
#######################################################################

setup ()
{
  echo Setup
  #for i in $led ; do gpio mode  $i out ; done
  #for i in $led; do gpio write $i   0 ; done
  gpio mode $led out
  gpio write $led 0
}

# pulseLight:
#	Pulse the LED for one second
#######################################################################

pulseLight ()
{
  echo -n "Pulse light for one second "
  gpio write $led 1
  sleep 1
  gpio write $led 0
  echo "Light off"
}

#######################################################################
# The main program
#	Call our setup routing once, then pulse the light once and exit
#######################################################################

setup
pulseLight
