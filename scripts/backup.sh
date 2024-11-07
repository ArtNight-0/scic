# scripts/backup.sh
#!/bin/bash

DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/backups"
MYSQL_HOST="db"
RETENTION_DAYS=${BACKUP_RETENTION_DAYS:-7}

# Ensure backup directory exists
mkdir -p "$BACKUP_DIR"

# Get list of all databases except system databases
databases=$(mysql -h "$MYSQL_HOST" -uroot -p"$MYSQL_ROOT_PASSWORD" -e "SHOW DATABASES;" | grep -Ev "(Database|information_schema|performance_schema|mysql|sys)")

# Backup each database
for db in $databases; do
    echo "Backing up database: $db"
    mysqldump -h "$MYSQL_HOST" -uroot -p"$MYSQL_ROOT_PASSWORD" --databases "$db" | gzip > "$BACKUP_DIR/${db}_${DATE}.sql.gz"
done

# Delete backups older than retention period
find "$BACKUP_DIR" -type f -name "*.sql.gz" -mtime +"$RETENTION_DAYS" -delete

echo "Backup completed at $(date)"