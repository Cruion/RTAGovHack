<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>State of the Queensland Rental Market - GovHack 2014</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cosmo/bootstrap.min.css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



    </head>
    <body>

        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php" style="font-variant:small-caps;">State of the Queensland Rental Market - GovHack 2014</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1" >
                <h1 style="font-variant:small-caps;"><small>Project: </small>State of the Queensland Rental Market</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1" >
                <p>
                    This project showcases the current rental market within the state of Queensland. By showing the previous nine months of new bonds commencing, registered with the Queensland <em style="font-variant: small-caps;">Residential Tenancies Authority</em>, the system allows users to investigate the rental market around them.
                </p><p>
                    People are able to see for each suburb, the different number of new rentals that commenced in the last nine months, statistics on the weekly rental price and the different types of properties that make up the suburb. By presenting the new rentals over the nine month period, users are able to see when there is a large amount of change occurring in suburb. This allows them to identify potentially when is the best or worst time to consider moving to a new suburb. It also identifies what the average rental value is within the suburb for the month so tenants and owners can see if they are getting the better end of the deal.
                </p>
                <img class="img-responsive" src="img/whatis.PNG" alt="Image of website" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1" >
                    <h3>How was it made?</h3>
                <p>
                    The project uses a standard web technology stack (front end – HTML5, CSS, JS; back end – PHP, MySQL) for delivering the outcomes. A number of client-side frameworks (Twitter Bootstrap [<a href="http://getbootstrap.com/">http://getbootstrap.com/</a>], Google Maps [<a href="https://developers.google.com/maps/">https://developers.google.com/maps/</a>], Google Charts [<a href="https://developers.google.com/chart/">https://developers.google.com/chart/</a>], Map Icons [<a href="http://map-icons.com/">http://map-icons.com/</a>]) to present the RTA data in a meaningful format. 
                </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1" >
                    <h4>Project Developer</h4>
                    <p><strong>Jason Weigel</strong> is a PhD student at The University of Queensland (UQ) working Remote Collaboration around Physical Artefacts with Dr Stephen Viller and Dr Mark Schulz. He currently has a Bachelor of Information Technology and Master of Interaction Design from UQ also.</p>
                    <h4>Datasets Used</h4>
                    <p><em style="font-variant:small-caps">QLD Residential Tenancies Authority</em> rental bond data - [<a href="https://data.qld.gov.au/dataset/rental-bond-data">https://data.qld.gov.au/dataset/rental-bond-data</a>]
                    <p>The rental bond data was used to analyse the statistics of the different suburbs rental data over the nine month period in which the data is available.</p></br>
                    <p><em style="font-variant:small-caps">Australian Bureau of Statistics</em> suburb boundaries - [<a href="http://www.abs.gov.au/AUSSTATS/abs@.nsf/DetailsPage/1270.0.55.003July%202011?OpenDocument">http://www.abs.gov.au/AUSSTATS/abs@.nsf/DetailsPage/1270.0.55.003July%202011?OpenDocument</a>]
                    <p>The suburb boundaries was used to find the geographical location of the suburb for mapping the rental data onto a map.</p>
                    <h4>Nominations for GovHack 2014 Prize Categories</h4>
                    <p>
                        <strong><em style="font-variant:small-caps">National: The Best Open Government Hack</em></strong>
                    </p>
                    <p>
                        <strong><em style="font-variant:small-caps">National: The Best Business Hack</em></strong> - Best overall Business hack
                    </p>
                    <p>
                        <strong><em style="font-variant:small-caps">National: The Best Data Journalism Hack</em></strong> - Best overall Data Journalism hack
                    </p>
                    <p>
                        <strong><em style="font-variant:small-caps">Local (Brisbane): Best Use of Queensland Government Data</em></strong>
                    </p>
                    <p>
                        <strong><em style="font-variant:small-caps">Local (Brisbane): The Griffith University Prize</em></strong>
                    </p>
                    <p>
                        <strong><em style="font-variant:small-caps">Other: Best University Teams</em></strong>
                    </p>
                </div>
            </div>
        </div>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>