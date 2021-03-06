#!/usr/bin/env bash

set -e ;

if test -z "$1" ; then
    echo "No user specified!" 1>&2
    exit -1
fi

echo -n "Dropping if existing nerdz user and database... "

dropdb -U "$1" nerdz || true
dropuser -U "$1" nerdz || true

echo "Done." ; echo

echo  "Creating database and user nerdz (you'll be asked for password)..."

createuser -P -U "$1" -S nerdz
createdb -U "$1"  nerdz

echo "Done." ; echo

echo -n "Setting variables and privileges..."

psql nerdz "$1" << EOF 1>/dev/null

GRANT ALL PRIVILEGES ON DATABASE nerdz TO nerdz\;
ALTER DATABASE nerdz SET timezone = 'UTC'\;
CREATE EXTENSION pgcrypto\;

EOF

echo "Done." ; echo

echo -n "Loading nerdz database schema and triggers into PostgreSQL... "

if test -f postgres_schema.sql ; then

    psql nerdz nerdz < postgres_schema.sql 1>/dev/null

else
    echo "\nNo postgres_schema.sql found in current PWD.\n (Are you in NERDZ_ROOT/setup/ ?)" 1>&2
fi

echo "Done." ; echo
echo "REMEMBER TO SET timezone = 'UTC' IN postgresql.conf OR NOTHING WILL WORK!"
echo "If you have an existing MySQL database, you can now migrate it with setup/nerdz_my2pg.groovy."
