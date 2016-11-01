<!DOCTYPE html>
<html>
<head>
    <title>Fantasy General Layout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            position: relative;
        }
        .affix {
            top:0;
            width: 100%;
            z-index: 9999 !important;
        }
        .navbar {
            margin-bottom: 0px;
        }

        .affix ~ .container-fluid {
            position: relative;
            top: 50px;
        }
        #section1 {padding-top:50px;height:270px;width:1000px;color: #fff; background-color: #2ECC40;}
        #section2 {padding-top:50px;height:270px;width:1000px;color: #fff; background-color: #99CC66;}

    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="container-fluid" style="background-color:#000099;color:#fff;height:30px;">
    <h5>Welcome</h5>

</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">General Layout</a>
        </div>
        <div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#section1">Section 1</a></li>
                    <li><a href="#section2">Section 2</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div id="section1" class="container-fluid">
    <h1>Section 1</h1>
    <p>first text</p>
</div>
<div id="section2" class="container-fluid">
    <h1>Section 2</h1>
    <p>second text</p>
</div>


</body>
</html>