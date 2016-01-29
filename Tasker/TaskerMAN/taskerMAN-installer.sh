#!/bin/bash

echo "---------------TaskerMAN installer-----------------"
echo "Please enter in the destination location:"
read destination

unzip ./taskerMAN -d $destination
fixwebperms




