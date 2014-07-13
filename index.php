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

        <link rel="stylesheet" href="css/typeahead.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->



        <style>
            html, body, #map-canvas {
                height: 100%;
                margin: 0px;
                padding: 0px;
                overflow: hidden;

            }

            #map-canvas {
                height: 100%;
                margin-top: -60px;
            }

            .marker-label,
            .marker-icon {
                z-index: 9999999999;
                position: absolute;
                display: block;
                margin-top: -60px;
                margin-left: -25px;
                width: 50px;
                height: 50px;
                font-size: 20px !important;
                text-align: center;
                color: #FFFFFF;
                white-space: nowrap;
            }

            #searchoverlay {
                position: absolute;
                z-index: 2;
                top: 60px;
                margin-left: auto;
                margin-right: auto;
                left: 0;
                right: 0;
            }

            #paneloverlay {
                position: absolute;
                overflow: auto;
                z-index: 1;
                top: 140px;
                left: 5%;
                padding-left: 20px;
                height: 70%;
                width: 25%;
                background-color: white;
                -webkit-box-shadow: 1px 1px 5px 0px rgba(50, 50, 50, 0.75);
                -moz-box-shadow:    1px 1px 5px 0px rgba(50, 50, 50, 0.75);
                box-shadow:         1px 1px 5px 0px rgba(50, 50, 50, 0.75);
            }
        </style>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <script src="js/typeahead.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs6blCRBf_fT4MGF3ZypseuQWrQJ9H9As&3.15"></script>
        <link rel="stylesheet" type="text/css" href="css/map-icons.css" />
        <script src="js/map-icons.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript"
                src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['sankey']}]}">
        </script>
        <script>

            var map;
            var blaha = 1;
            var markers = [];
            var locations = [];
            function initialize() {

                var styles = [
                    {
                        featureType: "all",
                        stylers: [
                            {saturation: -100},
                            {visibility: "off"}
                        ]
                    }, {
                        featureType: "road",
                        elementType: "geometry",
                        stylers: [
                            {lightness: -100},
                            {visibility: "simplified"}
                        ]
                    }, {
                        featureType: "administrative",
                        elementType: "geometry",
                        stylers: [
                            {hue: "#FF0000"},
                            {saturation: 60},
                            {lightness: 20},
                            {visibility: "on"}
                        ]
                    }, {
                        featureType: "water",
                        elementType: "geometry",
                        stylers: [
                            {hue: "#0000FF"},
                            {saturation: 60},
                            {lightness: -20},
                            {gamma: 1.51},
                            {visibility: "simplified"}
                        ]
                    }, {
                        featureType: "landscape",
                        elementType: "geometry",
                        stylers: [
                            {hue: "#FFFFFF"},
                            {lightness: 100},
                            {visibility: "simplified"}
                        ]
                    }, {
                        featureType: "road",
                        elementType: "labels",
                        stylers: [
                            {visibility: "off"}
                        ]
                    }
                ];



                var mapOptions = {
                    zoom: 13,
                    center: new google.maps.LatLng(-27.4679, 153.0278),
                    disableDefaultUI: true
                };
                map = new google.maps.Map(document.getElementById('map-canvas'),
                        mapOptions);
                map.setOptions({styles: styles});
            }

            google.load("visualization", "1", {packages: ["corechart"]});

            google.maps.event.addDomListener(window, 'load', initialize);

            $(document).ready(function() {

                $('#paneloverlay').hide();
                var substringMatcher = function(strs) {
                    return function findMatches(q, cb) {
                        var matches, substrRegex;

                        // an array that will be populated with substring matches
                        matches = [];

                        // regex used to determine if a string contains the substring `q`
                        substrRegex = new RegExp(q, 'i');

                        // iterate through the pool of strings and for any string that
                        // contains the substring `q`, add it to the `matches` array
                        $.each(strs, function(i, str) {
                            if (substrRegex.test(str)) {
                                // the typeahead jQuery plugin expects suggestions to a
                                // JavaScript object, refer to typeahead docs for more info
                                matches.push({value: str});
                            }
                        });

                        cb(matches);
                    };
                };

                var suburbs = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('locality'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    prefetch: 'suburbs.php'
                });

                suburbs.initialize();

                $('#suburbsearch .typeahead').typeahead(null, {
                    name: 'suburbs',
                    displayKey: 'locality',
                    source: suburbs.ttAdapter()
                }).on("typeahead:selected", function(obj, datum) {
                    suburbSelect(datum.locality);
                });

                $("form[name=suburbform]").bind('submit', function() {
                    suburbSelect($('#search').val());
                    return false;
                });
            });

            function addMarker(location, num, suburb) {
                var i = 0;
                for (i = 0; i < locations.length; i++) {
                    if (locations[i].equals(location)) {
                        return;
                    }
                }
                locations.push(location);

                var marker = new Marker({
                    map: map,
                    zIndex: blaha,
                    title: suburb,
                    position: location,
                    icon: {
                        path: MAP_PIN,
                        fillColor: '#000000',
                        fillOpacity: 1,
                        strokeColor: '#FFFFFF',
                        strokeWeight: 2,
                        scale: 1 / 2
                    },
                    label: num
                });
                marker.setMap(map);

                google.maps.event.addListener(marker, 'click', function() {
                    $('#paneloverlay').show();
                    $('#suburbname').text(marker.title.toLowerCase());
                    map.setCenter(marker.getPosition());
                    $.post("suburbGraph.php", {suburb: marker.title}, function(result) {
                        var data = google.visualization.arrayToDataTable(jQuery.parseJSON(result));

                        var options = {
                            title: 'Statistics on Weekly Rental',
                            vAxis: {title: 'Dollars', maxValue: 1200},
                            isStacked: false
                        };

                        var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                    });

                    $.post("generatedBy.php", {suburb: marker.title}, function(result) {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Dwelling Type');
                        data.addColumn('string', 'Bedrooms');
                        data.addColumn('number', 'Number of Bonds');
                        console.log(result);
                        data.addRows(jQuery.parseJSON(result));

                        // Set chart options
                        var options = {
                        };

                        // Instantiate and draw our chart, passing in some options.
                        var chart = new google.visualization.Sankey(document.getElementById('sankey_basic'));
                        chart.draw(data, options);
                    });
                });

                markers.push(marker);
                blaha++;
            }

            function suburbSelect(suburb) {
                $.post("latlong.php", {suburb: suburb}, function(result) {

                    var obj = jQuery.parseJSON(result);
                    if (obj.hasOwnProperty("latitude") && obj.hasOwnProperty("longitude")) {
                        var ll = new google.maps.LatLng(obj.latitude, obj.longitude);
                        map.panTo(ll);
                    }
                });
                $.post("nearbyRegion.php", {suburb: suburb}, function(result) {
                    blaha = 1;
                    for (var i = 0; i < markers.length; i++) {
                        markers[i].setMap(null);
                    }
                    markers = [];
                    locations = [];
                    var obj2 = jQuery.parseJSON(result);
                    var i = 0;
                    $('#suburbname').text(suburb.toLowerCase());
                    for (i = 0; i < obj2.length; i++) {
                        var ll = new google.maps.LatLng(obj2[i].latitude, obj2[i].longitude);
                        addMarker(ll, obj2[i].numBonds, obj2[i].suburb);
                    }
                });
            }

            function closepanel() {
                $('#paneloverlay').hide();
            }
        </script>  

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
        <div id="map-canvas"></div>

        <div class="container" id="searchoverlay">
            <div class="row">
                <form role="form" name="suburbform">
                    <div class="form-group" id="suburbsearch">
                        <input type="type" style="text-transform: uppercase;" class="form-control input-lg typeahead" id="search" placeholder="Suburb Search" autocomplete="off">
                    </div>
                    <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div id="paneloverlay">
                    <h1 id="suburbname" style="font-variant:small-caps; text-transform: capitalize">Brisbane <small>4000</small></h1>
                    <p style="font-variant:small-caps; position: absolute; top: 5px; right: 5px;">
                        <button onclick="closepanel()" type="button" class="btn btn-default btn-xs">Close</button>
                    </p>
                    <div id="chart_div"></div>
                    <div id="sankey_basic"></div>
                </div>
            </div>
        </div>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>