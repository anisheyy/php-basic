<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="selectionpagekoStyle.css">
  <title>AnimeVault - Selection Page</title>
</head>

<body>
  
<div class="header">
  
  <h1>
    Welcome <?php 
    session_start();
    echo $_SESSION['username'] 
    ?> ! Select your Choice
  </h1>

  <a href="logout.php" class="logout" >Logout</a>

  </div>
  
  <div class="groupSelection">
      
      <div class="group strawHats">
        <a href="../php/strawHats/strawHats.html" class="groupLink">Straw Hats</a>
      </div>

      <div class="group akatsuki">
        <a href="../php/akatsuki/akatsuki.html" class="groupLink">Akatsuki</a>
      </div>
      
      <div class="group phantom">
        <a href="../php/phantomTroupe/phantom.html" class="groupLink">Phantom Troupe</a>
      </div>
  </div>
</body>
</html>
