<?php
require './core/session.php';
require './core/config.php';
require './core/user_key.php';

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hostel Management Portal </title>
  <link rel="shortcut icon" href="./files/img/hm12.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="./files/css/bootstrap.css"> -->
  <link rel="stylesheet" href="./files/css/custom.css">


</head>

<body>

  <div class="animated fadeIn">


    <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Complaints</h2>
    </div>

    <?php require 'nav-profile.php'; ?>
    <div class="div">
      <div class="col-lg-12">
        <?php
        $email = $_SESSION['email'];
        $result = mysql_query("SELECT * FROM `cmp_log` WHERE email='$email'");
        $num_rows = mysql_num_rows($result);

        ?>
        <!-- <div class='admin-data'>
                Complaints
                <span class='button view' href=''><?php echo "$num_rows"; ?> </a>
              </div> -->

        <br><br><br><br>
        <br><br>

        <br>
        <h2 class="text-center"><?php echo $message; ?></h2>
        <br><br>

        <div class="list-group" style="width:37em;">
          <ol>
            <?php

            while ($data = mysql_fetch_array($result)) {
              // echo"<div class='admin-data'>";
              echo '<li>';
              echo "<a href='status-view.php?ref=$data[ref_no]' data-bs-toggle='popover' data-bs-trigger='hover focus' title='Complain' data-bs-content='$data[complain]' class='list-group-item list-group-item-action' aria-current='true' style='color:black; border-radius:12px'>";
              echo '<div class="d-flex w-100 justify-content-between">';
              echo '<h5 class="mb-1">';
              echo $data['CategoryOfIssue'];
              $empty = $data['CategoryOfIssue'];
              echo '</h5>';
              echo '<small>3 days ago</small>';
              echo '</div>';
              echo "<p class='mb-1'>Category: $data[CategoryOfIssue]</p>";
              echo '<div class="d-flex justify-content-between">';
              echo "<small style='color:#37474f'>$data[nameOfHostel], $data[address] | Phone No. ";
              echo $data['phone no'];
              echo " | Availability: $data[availability]</small>";
              // echo '<small style="color:red">Public</small>';
              echo '<medium style="color:green">Private</medium>';
              echo '</div>';
              // echo "<a class='button view' href='status-view.php?ref=$data[ref_no]'>View Status</a>";
              // echo "</div>";
              echo "</a>";
              echo '</li>';
              echo "<br>";
              // echo "<br><br><br><br><br>";
            }
            if (empty($empty) == true) {
              $message = "You Have no Message !!";
            } else {
              $message = "You Have got some Message";
            }


            ?>
          </ol>
        </div>



        <br><br><br><br><br><br><br><br><br><br><br><br>

      </div>
    </div>

  </div>

  <!-- <footer2>
    <br><br>&copy <?php echo date("Y"); ?> <?php echo $web_name; ?>
  </footer2> -->

  <script src="files/js/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="files/js/script.js"></script>
  <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })
  </script>

</body>

</html>