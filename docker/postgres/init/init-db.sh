#!/bin/bash
# Path to the configuration files
PG_CONF="/var/lib/postgresql/data/postgresql.conf"
PG_HBA="/var/lib/postgresql/data/pg_hba.conf"

# Append the necessary configuration to postgresql.conf
echo "password_encryption = md5" >> "$PG_CONF"

# Back up the original pg_hba.conf file
cp "$PG_HBA" "${PG_HBA}.bak"

# Comment out the existing line with scram-sha-256 and add md5 authentication
sed -i '/scram-sha-256/s/^/#/' "$PG_HBA"
echo "host all all all md5" >> "$PG_HBA"


set -e

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" <<-EOSQL
    CREATE DATABASE project_name_change_me;
    GRANT ALL PRIVILEGES ON DATABASE project_name_change_me TO project_name_change_me;

EOSQL
