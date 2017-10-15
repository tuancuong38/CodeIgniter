<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

    .marginTop {
        margin-top: 5px;
    }
    .divButton {
        margin-top: 5px;
    }
	

	</style>
</head>
<body>

<div id="container">
	<h1>Đăng Ký Thành Viên</h1>

	<div id="body">
		<form action="createUser">
            <div >
                <span>Email:</span> 
                <input type="text" name="lastName">
            </div>
            <div class="marginTop">
                <span>Password:</span> 
                <input type="text" name="firstName">
            </div>
            
            <div class="divButton">
                <input type="Submit" value="Create">
                <input type="button" value="Cancel">
            </div>
        </form>
	</div>

</div>

</body>
</html>