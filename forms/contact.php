<?php
  // Requires the "PHP Email Form" library
  // The "PHP Email Form" library is available only in the pro version of the template
  // The library should be uploaded to: vendor/php-email-form/php-email-form.php
  // For more info and help: https://bootstrapmade.com/php-email-form/

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'saepulloh0711@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Use the SMTP credentials for your email configuration
  $contact->smtp = array(
    'host' => 'smtp.example.com', // replace with your SMTP host
    'username' => 'your_email@example.com', // replace with your email address
    'password' => 'your_email_password', // replace with your email password
    'port' => '587' // replace with your SMTP port, usually 587 or 465
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
