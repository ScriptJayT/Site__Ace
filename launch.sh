#!/bin/bash

# https://github.com/yandeu/five-server-with-php
# add to php root: <script async data-id="five-server" src="http://localhost:5500/fiveserver.js"></script>

currentdir=$(pwd)

echo $currentdir

php -S 127.0.0.1:8000 -t "$currentdir"

npx -y five-server@latest --port=5500 --open=http://localhost:8000