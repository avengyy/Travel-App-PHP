<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tilltro</title>

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
  session_start();
  require_once('./php/database.php');

    // Add Bookmark Handler
      $tourId = $_GET['tourId'];

      if($_SESSION['userId']) {
        if (isset($_GET['tourId'])) {
          $userId = $_SESSION['userId'];
          $sql = "INSERT INTO tour_login (userId, tourId) VALUES ('$userId', '$tourId')";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            echo "<script>alert('Added to bookmarks');
            setTimeout(function() {
              window.location.href = 'tour-detail.php?id=$tourId';
            }, 500)</script>";
          }
          if (mysqli_affected_rows($conn) == 0) {
            echo "<script>
            alert('Failed to add to bookmarks');
            setTimeout(function() {
              window.location.href = 'tour-detail.php?id=$tourId';
            }, 500)</script>";
          }
        }
      } else {
        echo "<script>
        alert('Please login first before adding bookmark!');
        window.location.href = 'tour-detail.php?id=$tourId';
        </script>";
      }


?>
<div class="spinner"></div>
</body>
</html>