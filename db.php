<?php
session_start();

$conn = mysqli_connect(
  'us-cdbr-iron-east-01.cleardb.net',
  'b76c462e2a2eba',
  '7220f035',
  'heroku_7aa9b5beaf04b32'
) or die(mysqli_erro($mysqli));

?>
