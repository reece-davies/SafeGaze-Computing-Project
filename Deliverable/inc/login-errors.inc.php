<?php
    if (isset($_GET['error']))
    {
      if ($_GET['error'] == 'emptyfields')
      {
        echo '<p class="error-message"> Fill in all fields. </p>';
      }
      else if ($_GET['error'] == 'sqlerror')
      {
        echo '<p class="error-message"> There is an error with the database. </p>';
      }
      else if ($_GET['error'] == 'wrongpwd' || $_GET['error'] == 'nouser')
      {
        echo '<p class="error-message"> Wrong username and/or password. </p>';
      }
    }
?>
