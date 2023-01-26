#!/usr/bin/env sh

source .env

rm -rf ~/windycoys/backup
rm -f ~/windycoys/windycoys-*.tgz
mkdir -p ~/windycoys/backup

scp -r ~/windycoys/wp-content ~/windycoys/backup/
docker exec -it $DOCKER_DB_NAME /usr/bin/mysqldump -uroot -p"$DB_ROOT_PASSWORD" $DB_NAME | gzip -9  > ~/windycoys/backup/database.sql.gz
ls -l ~/windycoys/backup/

datetime=$(date +'%Y-%m-%dT%H-%M-%S')
file=windycoys-$datetime.tgz
/usr/bin/tar zcf ~/windycoys/$file ~/windycoys/backup

rm -rf ~/windycoys/backup
