<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>
        CMARS sign in
    </title>

    <style>
        body {
            position: relative;
            top: 2cm;
            left: 30%;
            font-family: Arial;
            background-image:<img src="{{URL::to('/assets/image.jpg')}}">
        }
        
        div.main {
            border: 1px solid;
            padding: 0px 0px 30px;
            width: 40%;
            background: white;
            font-size: medium;
        }

        .text, #cancel, #submit {
            font-size: large;
            width: 70%;
            border-radius: 4px;
        }

        div.sub, div#user{
            padding-left: 1cm;
        }

        h1 {
            padding: 5px;
            border: 1px solid black;
            font-size: x-large;
            text-align: center;
            color: darkblue;
            background-color: lightgray;
            margin-top: 0;
        }

        a:link, a:visited {
            font-weight: bold;
            color: white; 
            text-align: center; 
            text-decoration: none; 
            width: 50%;
            border-radius: 4px;
        }

        #submit {
            background-color: #ff6a00;
        }
        #cancel {
            background-color: #069817;
        }

    </style>
</head>

<body>
    <div class="main">
        <h1>COVID-19 Case Management And Reporting Tool For Uganda</h1>

        <div class="sub">
            <h2>New Account</h2>

            <form action="/dashboard" method="post">
                <b>Are you:</b><br />
                <div id="user">
                    A system administrator? <input type="radio" name="user" value="admin" checked><br />
                    A director? <input type="radio" name="user" value="director"><br><br>
                </div>

                <div>
                    <b>First Name</b>
                    <br /><input type="text" name="fname" required class="text"><br /><br />
                    <b>Surname</b>
                    <br /><input type="text" name="surname" required class="text"><br /><br />
                    <b>Email Address</b>
                    <br /><input type="email" name="email" required class="text"><br /><br />
                    <b>Username</b>
                    <br /><input type="text" name="username" required class="text"><br><br>
                    <b>Password</b>
                    <br /><input type="password" name="password" pattern="[a-zA-Z0-9]{8}" required class="text"><br /><br />
                    <b>Confirm Password</b>
                    <br /><input type="password" name="password" required class="text"><br /><br />
                </div>
                <div> 
                    <a href="/dashboard">
                        <input type="submit" value="Create my new account" id="submit"><br /><br />
                    </a>
                    <input type="reset" value="Cancel" id="cancel">
                </div>
            </form>
        </div>
    </div>
</body>

</html>