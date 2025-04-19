<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Bakery Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: #ff6b6b;
            color: white;
            padding: 15px 0;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 5%;
            padding-right: 5%;
        }
        .header-brand {
            display: flex;
            align-items: center;
        }
        .header-brand h1 {
            font-family: 'Pacifico', cursive;
            margin: 0;
            font-size: 28px;
        }
        nav {
            display: flex;
            align-items: center;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 20px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .welcome-panel {
            text-align: center;
            padding: 50px 0;
        }
        .welcome-panel h2 {
            color: #ff6b6b;
            font-size: 36px;
            margin-bottom: 20px;
        }
        .welcome-panel p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #666;
        }
        .menu-cards {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 40px;
        }
        .menu-card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .menu-card:hover {
            transform: translateY(-5px);
        }
        .menu-card h3 {
            color: #ff6b6b;
            margin-top: 0;
        }
        .menu-button {
            display: inline-block;
            background-color: #ff6b6b;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .menu-button:hover {
            background-color: #ff5252;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #ff6b6b;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .action-buttons a, .action-buttons button {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 3px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-add {
            background-color: #4CAF50;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
            display: inline-block;
        }
        .btn-edit {
            background-color: #2196F3;
        }
        .btn-delete {
            background-color: #f44336;
        }
        .search-form {
            margin-bottom: 20px;
            display: flex;
        }
        .search-form input[type="text"] {
            padding: 8px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
        }
        .search-form button {
            padding: 8px 15px;
            background-color: #ff6b6b;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group textarea {
            height: 100px;
        }
        .form-submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-brand">
            <h1>Sweet Bakery Management System</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="pesanan.php">Pesanan</a></li>
            </ul>
        </nav>
    </header>

    
</body>
</html>