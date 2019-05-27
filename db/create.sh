#!/bin/sh

if [ "$1" = "travis" ]; then
    psql -U postgres -c "CREATE DATABASE fotocasa_test;"
    psql -U postgres -c "CREATE USER fotocasa PASSWORD 'fotocasa' SUPERUSER;"
else
    sudo -u postgres dropdb --if-exists fotocasa
    sudo -u postgres dropdb --if-exists fotocasa_test
    sudo -u postgres dropuser --if-exists fotocasa
    sudo -u postgres psql -c "CREATE USER fotocasa PASSWORD 'fotocasa' SUPERUSER;"
    sudo -u postgres createdb -O fotocasa fotocasa
    sudo -u postgres psql -d fotocasa -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    sudo -u postgres createdb -O fotocasa fotocasa_test
    sudo -u postgres psql -d fotocasa_test -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    LINE="localhost:5432:*:fotocasa:fotocasa"
    FILE=~/.pgpass
    if [ ! -f $FILE ]; then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE; then
        echo "$LINE" >> $FILE
    fi
fi
