<?php
 $con = mysql_connect("localhost", "root", "") or die(mysql_error());

        // Selecing database
        $db = mysql_select_db("scsvmv_placement_app") or die(mysql_error()) or die(mysql_error());
  $notifications_count_query = mysql_query("SELECT * FROM notification_admin");
$notifications_count=0;
                if (mysql_num_rows($notifications_count_query) > 0) {
$notifications_count = mysql_num_rows($notifications_count_query);

}
?>