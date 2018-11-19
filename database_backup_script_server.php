<?php
   $dbhost = 'localhost';
   $dbuser = 'solushop';
   $dbpass = 'livinggooD1$';
   $dbname = "solushop_database";	
   
   $backup_file = "../backups/Solushop-DB-Backup-" . date("Y-m-d-H-i-s") . '.sql';
   echo $command = 'mysqldump --host="'.$dbhost.'" --user="'.$dbuser.'" --password="'.$dbpass.'" solushop_database > '.$backup_file;
   
   exec($command);
?>