<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Akses Ditolak</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #222;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        #logoutButton {
            padding: 10px 25px; 
            font-size: 14px; 
            font-weight: bold; 
            color: #fff;
            background-color: #007bff; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 20px; 
        }
        #logoutButton:hover {
            background-color: #0056b3; 
        }
    </style>
    <script type="text/javascript">
        function showAlert() {
            alert("Anda tidak memiliki izin untuk mengakses halaman ini.");
            document.getElementById('logoutButton').style.display = 'block';
        }

        function logout() {
            window.location.href = "logout.php";
        }
    </script>
</head>
<body onload="showAlert()">
    <div class="container">
        <label>Kamu gak punya akses ke halaman ini, buruan Log Out!!</label><br>
        <button id="logoutButton" onclick="logout()">Logout</button>
    </div>
</body>
</html>
