
<?php
session_start();
require_once './src/Database/auth/helper.php';
require_once './src/Database/Database.php';

$products = [];

Database::query("SELECT * FROM products");
$products = Database::getAll();


require_once(__DIR__ . '/template/head.inc.php');

?>
    <style>
        .welkom {
            background-color: black;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            margin: 200px;
            font-family: Arial, sans-serif;
            font-size: 2.5em;
            color: burlywood;
            flex-direction: column;
        }
    </style>
    <script>
        setTimeout(function() {
            window.location.href = "index.php";
        }, 3000);
    </script>
</head>
<body>
    <div class="welkom">
        <p>Moet nog gemaakt worden</p><br>
    </div>
</body>
<?php
require_once(__DIR__ . '/template/foot.inc.php');
?>
