<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['d']))
{
  $txt = $_POST['d'];

  $datfile = fopen("todo.txt", "w") or die("Unable to open file!");
  fwrite($datfile, $txt);
  fclose($datfile);
  $dat = file_get_contents("todo.txt");
  echo '<html>
  <form action="/index.php" method="post">
  <textarea id="d" name="d" rows="40" cols="500">
   '.$dat.'
  </textarea><br>
  <input type="submit">
    </form>
    </html>';

}

else
{
  $dat = file_get_contents("todo.txt");

  echo '<html>
  <form action="/index.php" method="post">
  <textarea id="d" name="d" rows="40" cols="500">
   '.$dat.'
  </textarea>
  <br>
  <input type="submit">
  </form>
  </html>';

}



function base_url()
{
  return dirname($_SERVER['SCRIPT_FILENAME']);
}



 ?>
