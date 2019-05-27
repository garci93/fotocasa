#!/bin/sh

BASE_DIR=$(dirname "$(readlink -f "$0")")
if [ "$1" != "test" ]; then
    psql -h localhost -U fotocasa -d fotocasa < $BASE_DIR/fotocasa.sql
fi
psql -h localhost -U fotocasa -d fotocasa_test < $BASE_DIR/fotocasa.sql
