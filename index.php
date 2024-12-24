<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="zactor/style.css">
    <title>CRUD System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contalner">
        <h2>Daftar Pengguna</h2>
        <div class="header-actions">
        <a href="create.php" class="btn">Tambah Pengguna Baru</a>
        <form action="search.php" method="GET" class="search-form">
        <input type="text" name="keyword" placeholder="Cari nama atau email..." required>
        <button type="submit">Cari</button>
    </form>
</div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Koneksi ke database
                $conn = new mysqli("localhost", "root", "", "crud_db");
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Cek apakah ada keyword pencarian
                if (isset($_GET['keyword'])) {
                    $keyword = $conn->real_escape_string($_GET['keyword']);
                    $sql = "SELECT * FROM pendaftar WHERE 
                            name LIKE '%$keyword%' OR 
                            email LIKE '%$keyword%' OR 
                            phone LIKE '%$keyword%'";
                } else {
                    $sql = "SELECT * FROM pendaftar";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>
                                <a href='update.php?id=" . $row["id"] . "' class='btn-edit'>Edit</a>
                                <a href='delete.php?id=" . $row["id"] . "' class='btn-delete'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>