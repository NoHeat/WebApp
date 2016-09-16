<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('fakdb.db');
      }
   }
   echo "<title>Fridge Assist Kit</title>";
   $db = new MyDB();	//declaration for a new db, you always do this so do it bruh
   if(!$db){
      echo $db->lastErrorMsg();		//error if no db, make your db bruh
   } else {
      echo "<h1><font color=green>Opened database successfully\n</font></h1>";	//succcess
      echo "<h3>Inventory below:</h3>";
      echo "<br>";
   }

   $sql =<<<EOF
      SELECT * from Main;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "<br>";	// new line
      echo "ID = ". $row['id'] . "\n"; //print id, currently coming out in wrong line, need fix

      

      echo "NAME = ". $row['name'] ."\n";	//print name
      echo "DESCRIPTION = ". $row['description'] ."\n";	//print description
      echo "PRICE =  ".$row['price'] ."\n\n";	//print price
   }
   echo "<br><br>";		//new line break
   echo "<b><p style=font-size:12px>Operation done successfully\n</font-size></b><br><br>";	//finish
   echo "<img src=yummyfood.jpeg><br>";
   echo "Sorry about the roach<br><img src=testimg.jpg><br>";
   $db->close();	//close db cause other ppl gotta use it, will this cause issues?
?>