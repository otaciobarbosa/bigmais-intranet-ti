#!/bin/bash

source ~/.bashrc source ~/.nvm/nvm.sh
pm2 jlist | jq -r '.[].name' > /tmp/portas.txt
