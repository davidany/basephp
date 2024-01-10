#!/bin/bash

file="/etc/php.d/15-xdebug.ini"
search="zend_extension=xdebug.so"

if grep -q "^$search" "$file"; then
  sed -i "s/^$search/; $search/" "$file"
  echo "Xdebug disabled"
else
  sed -i "s/^; $search/$search/" "$file"
  echo "Xdebug enabled"
fi
httpd -k restart
