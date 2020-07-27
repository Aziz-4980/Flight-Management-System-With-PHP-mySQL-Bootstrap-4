<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- build:css css/main.css -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link href="css/styles.css" rel="stylesheet">
    <!-- endbuild -->
    <title>Flight management system</title>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand"> <a class="navbar-brand mr-auto" href="./index.html"><img src="img/logo.png" height="30" width="41"></a></a>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="./index.html"><span class="fa fa-home fa-lg"></span>
                            Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./aboutus.html"><span class="fa fa-info fa-lg"></span> About</a></li>
                    <li class="nav-item"><a class="nav-link" href="./admin.html"><span class="fa fa-list fa-lg"></span>
                            Admin</a></li>
                    <li class="nav-item active"><a class="nav-link" href="./contactus.html"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>



    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-6">
                    <h1>Your Own Flight Management System</h1>
                    <p>We take inspiration from the World's best airliners and with our experience presents to you the
                        most reliable flight management system</p>
                </div>
                <div class="col-12 col-sm-3 align-self-center">
                    <img src="img/logo.png" class="img-fluid">

                </div>
                <div class="col-12 col-sm-3 align-self-center">

                </div>



            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="./contactus.html">About us</a></li>
                <li class="breadcrumb-item active">Available Flights Information</li>
            </ol>
            <div class="col-12">
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <strong>
                <h3>Available Flights!</h3>
            </strong>

            <?php
            include_once 'database.php';

            $from = isset($_POST['from']) ? $_POST['from'] : '';
            $too =  isset($_POST['from']) ? $_POST['too'] : '';




            if ($from == 'Karachi' && $too == 'Islamabad') {
                $flightRoutes = 'kch-isl';
            } else if ($from == 'Karachi' && $too == 'Lahore') {
                $flightRoutes = 'kch-lhr';
            } else if ($from == 'Islamabad' && $too == 'Karachi') {
                $flightRoutes = 'isl-kch';
            } else if ($from == 'Islamabad' && $too == 'Lahore') {
                $flightRoutes = 'isl-lhr';
            } else if ($from == 'Lahore' && $too == 'Karachi') {
                $flightRoutes = 'lhr-kch';
            } else if ($from == 'Lahore' && $too == 'Islamabad') {
                $flightRoutes = 'lhr-isl';
            } else if ($from == $too) {
                echo '<script>alert("Destination and Arrival airports cannot be same!...")</script>';
                echo "<script>location.href = 'aboutus.html';</script>";
            }


            if ($from != '' and $too != '') {

                $sql = "SELECT * FROM flightDetails WHERE flightRoute = '$flightRoutes'";

                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Flight Registration Number</th>";
                        echo "<th>Flight Type</th>";
                        echo "<th>Flight Model Number</th>";
                        echo "<th>Total Capacity</th>";
                        echo "<th>Flight Route</th>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['FlightRegNo'] . "</td>";
                            echo "<td>" . $row['flightType'] . "</td>";
                            echo "<td>" . $row['flightModelNo'] . "</td>";
                            echo "<td>" . $row['totalCapacity'] . "</td>";
                            echo "<td>" . $row['flightRoute'] . "</td>";

                            echo "</tr>";
                        }
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else {

                        echo "No records matching your query were found.";
                        echo '<script>alert("Oops! No Flights Found...")</script>';
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
            } else if ($from == '' and $too == '') {
                echo '<script>alert("The Fields are Empty, Please Enter the fields correctly")</script>';
                echo "<script>location.href = 'aboutus.html';</script>";
            }




            ?>
        </div>
    </div>

    <br>
    <hr>
    <br>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="./aboutus.html">About</a></li>
                        <li><a href="./admin.html">Admin</a></li>
                        <li><a href="./contactus.html">Contact</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
                        396i Masjid Road<br>
                        Sialkot, Cantt<br>
                        PAKISTAN<br>
                        <i class="fa fa-phone fa-lg"></i>: +92 3348129506<br>
                        <i class="fa fa-fax fa-lg"></i>: +92 3348129507<br>
                        <i class="fa fa-envelope fa-lg"></i>:
                        <a href="mailto:abdul.aziz.khan.1122@gmail.com">abdul.aziz.khan.1122@gmail.com</a>
                    </address>
                </div>
                <div class="col-12 col-sm-4 align-self-center">
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google" href="http://google.com/abdul.aziz.khan"><i class="fa fa-google-plus"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/abdulaziz.khan.9040"><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/abdul.aziz.khan.official"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/aziz_4980"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-google" href="https://www.youtube.com/channel/UCViViYLQ3HwxKOCYm8MCTQw"><i class="fa fa-youtube"></i></a>
                        <a class="btn btn-social-icon" href="mailto:abdul.aziz.khan.1122@gmail.com"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <p>© Copyright 2020 Abdul Aziz Khan</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- build:js js/main.js -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- endbuild -->
</body>

</html>

<style>
    table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    table td,
    table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>