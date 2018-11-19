<?php
   $dbhost = 'localhost';
   $dbuser = 'solushop';
   $dbpass = 'livinggooD1$';
   $dbname = "solushop_database";	
   
   $backup_file = "C:/wamp64/www/solushop/backups/Solushop-DB-Backup-" . date("Y-m-d-H-i-s") . '.sql';
   echo $command = 'C:/wamp64/bin/mysql/mysql5.7.19/bin/mysqldump --host="'.$dbhost.'" --user="'.$dbuser.'" --password="'.$dbpass.'" solushop_database > '.$backup_file;
   
   exec($command);
?>