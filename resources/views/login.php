<!Doctype html>
<html>
<head>
    <title>Login</title>
    <style>
         .container {
            width: 500px;
            margin-left: 2%;
            margin-top: 5%;
            border: dashed;
            border-color: #9999ff;
            border-width: 2px;
        }
        .form-container input[type=text], .form-container input[type=password] {
            width: 90%;
            padding: 15px;
            margin: 10px 0 10px 0;
            border: none;
            background: #f1f1f1;
        }
        .form-container .btn {
            background-color: #9999ff;
            color: white;
            padding: 16px 20px;
        	margin-left: 35%;
            border: none;           
            width: 30%;
            margin-bottom:10px;
        }
        
    </style>
</head>
<body>
    <div class="container">
    <form action="validate" class="form-container" method="post">
        <h1 style="text-align: center;">Login</h1>
        <label><b>Username</b></label>
        <input type="text" placeholder="Username" name="username" required>
        <label><b>Password</b></label>
        <input type="password" placeholder="Password" name="password" required>
        <input type="submit" class="btn" value="Login">
                        
    </form>
    </div>       
</body>
</html>