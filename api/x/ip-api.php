<!-- Code by walterwick | walterwick.de -->

<?php

// şuanki  IP Addressi alır
$user_ip = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['search'])) {
    
  $user_ip = $_POST['ip'];
}


 
//ip-api.com den verilieri al
$data = file_get_contents("http://ip-api.com/json/$user_ip?fields=status,message,country,countryCode,region,regionName,city,zip,lat,lon,timezone,currency,isp,org,as,query");
$json = json_decode($data, true);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/whoisstyle.css" />
  <title>FindIT Whois IP Lookup PHP Script</title>
</head>

<body class="bg-default">
        
    <!-- Header Start -->
        <header>
          <!-- Navbar -->
          <nav class="navbar navbar-expand lg navbar-light bg-dark shadow-sm">
            <div class="container-fluid">
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                  <li class="nav-item active">
                    <a class="nav-link text-white" aria-current="page" href="#home"><i class="fa fa-home"></i>&nbsp;Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#howtouse"><i class="fa fa-user">&nbsp;</i>How To Use</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Navbar -->
        </header>
    <!-- Header End -->
    
    
<div class="container">
    <!-- Search Start -->
      <div class="search">
        <div class="container">
          <div class="row">
            <div class="col-md-5 mx-auto">
              <div class="txt text-center">
               
                   <img src="images/favicon.png" class="w-25 logo" />
                    <h1 class="main-heading">FindIT Whois IP Lookup PHP Script</h1>
               
                <p class="sub-heading">Search any IP address/domain</p>
              </div>
              <form class="form" action="" method="post">
                <input type="text" class="input me-2 bg-white" name="ip" placeholder="IP Address" value="<?php echo $user_ip; ?>" required />
                <button type="submit" name="search" class="btn bg-dark">
                   <i class="fa fa-search ms-1"></i>
                </button>
              </form>
            </div>
          </div>
      </div>
    <!-- Search End -->


    <div class="row mt-5"  id="home">
          
        <!-- Data Table -->
        <div class="col-md-6 shadow rounded p-3 bg-white m-auto">
          <table class="item table h-100 p-4 first bg-white">
            <tbody>
              <tr>
                <td>IP Address:</td>
                <td><?php echo $json['query']; ?></td>
              </tr>
              <tr>
                <td>Country:</td>
                <td><?php echo $json['country']; ?></td>
              </tr>
              <tr>
                <td>Country Code:</td>
                <td><?php echo $json['countryCode']; ?></td>
              </tr>
              <tr>
                <td>State/Region:</td>
                <td><?php echo $json['regionName']; ?></td>
              </tr>
              <tr>
                <td>City:</td>
                <td><?php echo $json['city']; ?></td>
              </tr>
              <tr>
                <td>Zip/Postal Code:</td>
                <td><?php echo $json['zip']; ?></td>
              </tr>
              <tr>
                <td>Latitude:</td>
                <td><?php echo $json['lat']; ?></td>
              </tr>
              <tr>
                <td>Longitude:</td>
                <td><?php echo $json['lon']; ?></td>
              </tr>
              <tr>
                <td>Timezone:</td>
                <td><?php echo $json['timezone']; ?></td>
              </tr>
              <tr>
                <td>Currency:</td>
                <td><?php echo $json['currency']; ?></td>
              </tr>
              <tr>
                <td>ISP:</td>
                <td><?php echo $json['isp']; ?></td>
              </tr>
              <tr>
                <td>ORG:</td>
                <td><?php echo $json['org']; ?></td>
              </tr>
              <tr>
                <td>AS:</td>
                <td><?php echo $json['as']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- Data Table -->
        
      </div>
      
      
        <!-- Advertisement Bottom -->
            <div class="row mt-5">
              <div class="col-md-12" style="background: wheat;">
                <img src="images/add-bottom.png" class="w-100" style="height:100px;object-fit:cover;">
            </div>
        <!-- Advertisement Bottom -->
        
        </div>
    </div>
</div>
<!-- About App Section-->
<div class="wrapper bg-light p-5" id="howtouse">
    <div class="container">
        <div class="row">
            <h5>About the app:</h5>
            <p>FindIT IP Lookup is a free online tool that is easy to use and lets you grab Location and Related Data of IP or Domain using API.</p>
            <h5>How to Use?</h5>
            <ul>
                <li>1. Enter IP Address or Domain eg. www.google.com</li>
                <li>2. Click the "Search" Button</li>
            </ul>
        </div>
    </div>
</div>

 
<!--Footer-->
    <footer class="page-footer bg-white font-small p-2">
    
      <!-- Copyright -->
      
      <div class="footer-copyright text-center py-3">
        <p>Copyright © 2022 <b>FindIT Whois IP Lookup</b> - All rights reserved</p>
      </div>
      <!-- Copyright -->
    
    </footer>
<!-- Footer -->
   <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<style>
  /* Code by Brave Coder | https://youtube.com/BraveCoder/ */

/* Poppins font CDN from Google */
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

:root {
  --theme-color: #06f;
  --hover-color: #005ce6;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  font-family: "Poppins", sans-serif;
  list-style:none;
}

/* Logo */
.logo{
    filter: drop-shadow(5px 5px 5px #4444dd);
}
.bg-default{
    background: #4444dd;
}
.main-heading{
    text-shadow: 2px 3px 4px white;
}
.sub-heading{
    color: white;
    font-weight: 500;
}
/* Navbar */
.navbar {
    background:#4444dd;
}
/* Button */
.btn {
  background:#4444dd;
  border: none;
  padding: 10px 16px;
  border-radius: 8px;
  font-weight: 500;
  font-size: 14px;
  outline: none;
  height: 40px;
  cursor: pointer;
  outline: none;
  color: white !important;
  text-decoration: none;
  transition: 0.3s all ease;
}

.btn:hover,
.btn:focus,
.btn:active,
.btn.active {
  box-shadow:none;
}
.btn:hover{
    background:#000 !important;
}
/* ./Button */

/* Input field */
.input {
  background-color: transparent;
  border: 2px solid hsl(0, 0%, 90%);
  border-radius: 8px;
  height: 40px;
  font-size: 14px;
  padding: 10px 16px;
  transition: 0.3s all ease;
}

.input:focus {
  border-color: #212529;
}
/* ./Input field */

/* Search */
.search {
  padding: 50px 0;
}

.search .txt h1 {
  font-weight: 600;
}

.search .form {
  display: flex;
}

.search .form input {
  flex: 5;
}
/* ./Search */


/* Bottom Add */
.bottom-ad{
    height: 100px;
    object-fit: cover;
}
</style>


</html>