<?php
  // Check if both parameters are set and are numbers
  if(isset($_POST['num1']) && isset($_POST['num2']) && is_numeric($_POST['num1']) && is_numeric($_POST['num2'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    // Calculate the sum
    $sum = $num1 + $num2;

    // Print the sum
    echo "{$num1} + {$num2} = {$sum}.";
  } else {
    echo "Please provide two numeric parameters.";
  }

  // Include a link back to the form
  echo "<br><a href='form2.html'>Do another sum</a>";
?>