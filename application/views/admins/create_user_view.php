<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Music Shop</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Styles -->
        <style>
           div.container{
                width: 960px;
                height: 610px;
                margin: 50px auto;
                position: relative;
            }
            div.main{
                width: 420px;
                float: left;
                padding: 10px 55px 40px;
                border: 15px solid white;
                box-shadow: 0 0 10px;
                border-radius: 2px;
            }
            input[type=text],[type=date] {
                float: right;
                flex: 1;
                font-size: 13px;
            }
            input[type=button], [type=submit] {
                flex: 1;
                font-size: 20px;
            }
            div.item {
                margin-top: 5px;
            }
            label {
                flex: 1;
            }
            form {
                display: flex;
                display: -webkit-flex;
                flex-direction: column;
                -webkit-flex-direction: column;
            }
            div.button {
                display: flex;
                display: -webkit-flex;
                margin-top: 18px;
            }
            div.none {
                flex: 0.1;
            }
            p.error {
                color: red;
                font-size: 12px;
            }
            p.success {
                color: blue;
                font-size: 20px;
            }
        </style>
        <script>
            function cancelForm() {
                document.getElementById("createFrom").reset();
            }
            
            $(document).ready(function (){
                $('#register').click(function () {
                    $.ajax({
                        url: "{{ secure_url('/create-user/insert') }}",
                        type: 'POST',
                        data: $('#createFrom').serialize(),
                        success: function(response) {
                            console.log(response);
                            var err = document.getElementsByClassName("error");
                            for(var i = 0; i < err.length; i++) {
                                err[i].innerHTML = '';
                            }
                            if(response.success){
                                document.getElementById('message').innerHTML = response.message;
                                document.getElementById("createFrom").reset();
                            } else {
                                for(var key in response.message) {
                                    document.getElementById('message').innerHTML = '';
                                    document.getElementById(key).innerHTML = response.message[key];
                                }
                            }
                        },
                    });
                });
            });
            
        </script>
    </head>
    <body>
        <div class="container">
            <h2>Đăng ký thành viên</h2>
            <div class="main">
                <p class="success" id="message"></p>
                
                <form class="form" id="createFrom" method="POST">
                    <div class="item @if ($errors->has('userId')) has-error @endif">

                        <label>Họ:</label>
                        <input type="text" name="lastName" ></br>
                        <p class="error" id="lastName"></p>
                    </div>
                    <div class="item">

                        <label>Tên :</label>
                        <input type="text" name="firstName" ></br>
                        <p class="error" id="firstName" ></p> 
                    </div>
                    <div class="item">

                        <label>Ngày sinh:</label>
                        <input type="date" name="birthday" ></br>
                        <p class="error" id="birthday"></p> 
                    </div>
                    <div class="item">

                        <label>Email :</label>
                        <input type="email" name="email" ></br>
                        <p class="error" id="email"></p> 
                    </div>
                    <div class="item">

                        <label>Mật khẩu :</label>
                        <input type="password" name="password" ></br>
                        <p class="error" id="password"></p> 
                    </div>
                    <div class="item">

                        <label>Quyền hạn :</label>
                        <select name="permis">
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                        </select>

                    </div>
                    <div class="item">

                        <label>Phone :</label>
                        <input type="tel" name="phone" ></br>
                        <p class="error" id="phone"></p> 
                    </div>
                    <div class="item">

                        <label>Địa chỉ :</label>
                        <input type="text" name="address" ></br>
                        <p class="error" id="address"></p> 
                    </div>

                    <div class="button">

                        <input type="button" name="register" id="register" value="Register">
                        <div class="none"></div>
                        <input type="button" name="cancel" id="cancel" value="Cancel" onclick="cancelForm()">

                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
