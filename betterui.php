<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simplenotes</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>


<?php

if(isset($_POST['d']))
{
  $txt = $_POST['d'];
  $datfile = fopen("todo.txt", "w") or die("Unable to open file!");
  fwrite($datfile, $txt);
  fclose($datfile);
}


function get_path($Protocol='https://') {
   return $Protocol.$_SERVER['HTTP_HOST'].str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__));
}

$path = get_path();
$dat = file_get_contents("todo.txt");

?>



<body style="margin:15px">

  <form method="post" action="<?php echo $path; ?>/betterui.php" >
   <textarea id="summernote" name="d">
     <?php echo $dat; ?>
   </textarea>
   <input type="submit">
 </form>

  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
</body>
</html>
