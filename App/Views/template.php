<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>La librairie gentille</title>
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>

<div class="callout large primary">
    <div class="row column text-center">
    <h1>La librairie gentille</h1>
    </div>
</div>

<br/>

<?php

//****************************/
if(isset($view) and file_exists('App/Views/'.$view . '.php')) include $view . '.php';
else include 'frontend/not-found.php';

?>

<br/>
<br/>
<br/>

<div class="callout ">
    <div class="row column text-center">
    <h3>Et puis ici un footer par exemple</h3>
    </div>
</div>


<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>

