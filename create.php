<?php
$conn = new mysqli('localhost', 'root', '', 'crud_db');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO pendaftar (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <style>
        /* Styling umum untuk latar belakang */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(90deg, #d0e6a5, #83c967);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        /* Styling untuk kontainer utama */
        .container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
            width: 400px;
            max-width: 90%;
            position: relative;
        }

        /* Styling untuk kotak judul */
        .title-box {
            background: linear-gradient(145deg, #76c043, #5ea336);
            padding: 10px;
            border-radius: 10px;
            margin: -40px auto 20px; 
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
            color: #fff;
            font-size: 2.5rem;
            font-family: 'Brush Script MT', cursive;
            text-align: center;
            width: 100%;
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(90deg, #1d6418, #51ce4c);
            border-radius: 8px;
            overflow: hidden;
            }

        .title-box:after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shine 3s infinite linear;
        }

        @keyframes shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Styling untuk form */
        form label {
            display: block;
            font-weight: bold;
            margin-top: 20px;
            text-align: left;
        }

        form input[type="text"], form input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1rem;
        }

        /* Styling untuk tombol Simpan */
        form button {
            width: 100%;
            padding: 12px;
            margin-top: 25px;
            background-color: #28a745;
            border: none;
            color: #fff;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
        form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

    </style>
</head>
<body>
    <div class="container">
        <div class="title-box">Tambah Pengguna</div>
        <form action="" method="post">
            <label>Nama:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Telepon:</label>
            <input type="text" name="phone" required>
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
