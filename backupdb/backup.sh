#!/bin/bash

USER="simgedicbackup"
PASSWORD=""
DATABASE="simgedic"

FINAL_OUTPUT=C:\xampp\htdocs\simgedic`date 
+%Y%m%d`_$DATABASE.sql
mysqldump --user=$USER --password=$PASSWORD $DATABASE 
> $FINAL_OUTPUT
gzip $FINAL_OUTPUT