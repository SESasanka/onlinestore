<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Google Sign Out Example</title>
  
</head>
<body onload="onLoad()">
  <!-- Your content -->
  <button id="sign-out" onclick="signOut()">Sign Out</button>








  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <script>
  function signOut() {
    google.accounts.id.disableAutoSelect();
    console.log('User signed out.');
    window.location ="signin.php";
  }
</script>

  <script ></script>
</body>
</html>


