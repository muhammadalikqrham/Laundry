<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <form action="tes.php" method="post">
      <input type="text" name="satuan[]">
      <input type="text" name="satuan[]" disabled>
      <input type="submit" value="submit">
    </form>
  </body>
</html>
<?php
$array = array("foo", "bar", "hello", "world");
$array2 = array("2", "3", "4");
$i = 0;
foreach ($array as $key ) {
   $value = $array2[$i];
  echo $key." ";
  echo $value."<br>";
  $i++;
}
?>