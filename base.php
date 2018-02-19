<?php
  if (isset($_POST['submit'])) {
    function attribution ($input, $errorcheck = true) {
      if (isset($_POST[$input])) {
        return $_POST[$input];}
        elseif ($errorcheck == true) {echo "erreur";};};
    function check ($test, $errorcheck = true) {
      if (!preg_match("/^[a-zA-Z ]*$/", $_POST[$test]) || $errorcheck == true) {
        echo "Erreur";
      } else {return attribution($test, $errorcheck);};
    };
    function checkMail ($testMail) {
      if (isset($_POST[$testMail]) && filter_var($_POST[$testMail], FILTER_VALIDATE_EMAIL)) {
      return filter_input(INPUT_POST,$testMail, FILTER_SANITIZE_EMAIL);}
      else {
        echo "Erreur";};
      };
    function checkText ($text) { if (strlen($_POST[$text]) < 50) {
      echo "votre description doit faire minimum 50 caractères";
    } else
      {return filter_input(INPUT_POST,$text, FILTER_SANITIZE_STRING);};
    };
    $country = check("country", false);
    $subject = check("subject", false);
    $name = check("name", false);
    $lastname = check("lastname", false);
    $email = checkMail("email", false);
    $message = checkText("message", false);
    $gender = attribution("gender", false);
  };
?>
