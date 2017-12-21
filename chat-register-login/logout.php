<?php

session_start();

session_destroy();

echo "<center>";
echo "You have logged out. Click <a href='index.php'>here</a> to login again";
echo "</center>";