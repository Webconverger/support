#!/bin/sh
test -f "a/$1" &&
tail "a/$1" | sed 's|V=\([^&]*\)|<a href="https://github.com/Webconverger/webc/commit/\1">\1</a>|'
