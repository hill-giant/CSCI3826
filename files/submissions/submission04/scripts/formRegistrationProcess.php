<?php
/*registrationFormProcess.php
  Registers a customer's given information and creates an account.
*/
if ($_POST['gender'] == "Female")
{
  $gender = "F";
}
else if ($_POST['gender'] == "Male")
{
  $gender = "M";
}
else
{
  $gender = "O";
}

if (emailAlreadyExists($db, $_POST['email']))
{
  echo "<h3>Sorry, but the given e-mail address is already registered.</h3>";
}
else
{
  $result = "";
  $unique_login = getUniqueID($db, $_POST['loginName']);
  if ($unique_login != $_POST['loginName'])
  {
    $result .= "<h3>Your chosen login name already exists.<br>
               You have been assigned $unique_login, instead.</h3>";
  }
  else
  {
    $result .= "<h3>Your login name is $unique_login.</h3>";
  }

  $query = "INSERT INTO my_Customers(
    customer_id,
    salutation,
    customer_first_name,
    customer_middle_initial,
    customer_last_name,
    gender,
    email_address,
    phone_number,
    street_address,
    city,
    region,
    postal_code,
    login_name,
    login_password
  )
  VALUES (
    NULL,
    '$_POST[salutation]',
    '$_POST[firstName],
    '$_POST[middleInitial]',
    '$_POST[lastName]',
    '$gender',
    '$_POST[email]',
    '$_POST[phone]',
    '$_POST[address]',
    '$_POST[city]',
    '$_POST[region]',
    '$_POST[postalCode]',
    '$unique_login',
    '".password_hash($_POST['password1'], PASSWORD_BCRYPT)."'
  );";
  $success = mysqli_query($db, $query);

  if ($success)
  {
    $result .= "<h3>Thank you for registering with our community.</h3>";
    $result .= "<h3>To log in and start shopping, please
               <a href='pages/formLogin.php'>click here</a>.";
    echo $result;
  }
  else
  {
    echo "Failure during registration. Please try again.";
  }
}
mysqli_close($db);

function emailAlreadyExists($db, $email)
{
  $query =
    "SELECT *
    FROM my_Customers
    WHERE email_address = '$email'";
  $customers = mysqli_query($db, $query);
  $num_records = mysqli_num_rows($customers);

  return $num_records > 0;
}

function getUniqueID($db, $login_name)
{
  $unique_login = $login_name;
  $query =
    "SELECT *
    FROM my_Customers
    WHERE login_name = '$unique_login'";
  $customers = mysqli_query($db, $query);
  $num_records = mysqli_num_rows($customers);
  if ($num_records != 0)
  {
    $suffix = 1;
    do
    {
      $unique_login = $login_name.$suffix;
      $query =
        "SELECT *
        FROM my_Customers
        WHERE login_name = '$unique_login'";
      $customers = mysqli_query($db, $query);
      $num_records = mysqli_num_rows($customers);
    }
    while ($num_records != 0);
  }
  return $unique_login;
}
?>
