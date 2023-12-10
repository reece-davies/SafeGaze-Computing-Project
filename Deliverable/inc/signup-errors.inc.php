<?php
    if (isset($_GET['error']))
    {
      if ($_GET['error'] == 'emptyfields')
      {
        echo '<p class="error-message"> Fill in all fields. </p>';
      }
      else if ($_GET['error'] == 'passwordcheck')
      {
        echo '<p class="error-message"> The passwords do not match. </p>';
      }
      else if ($_GET['error'] == 'emailcheck')
      {
        echo '<p class="error-message"> The emails do not match. </p>';
      }
      else if ($_GET['error'] == 'sqlerror')
      {
        echo '<p class="error-message"> There is an error with the database. </p>';
      }
      else if ($_GET['error'] == 'usernametaken')
      {
        echo '<p class="error-message"> The username is taken. </p>';
      }
      else if ($_GET['error'] == 'emailtaken')
      {
        echo '<p class="error-message"> The email address is taken. </p>';
      }
      else if ($_GET['error'] == 'accesscodetaken')
      {
        echo '<p class="error-message"> The access code is taken. </p>';
      }
    }
?>
