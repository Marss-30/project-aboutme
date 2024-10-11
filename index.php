<?php
$conn = new mysqli("localhost", "root", "", "databasemars");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
$sql = "SELECT * FROM notes ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="font-style: Tahoma;">Daftar Nama Bapak XI PPLG B</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="p-5">
    <h2 style= "color: whitesmoke; text-shadow: 3px 3px 8px; ">Daftar Nama Bapak XI PPLG B</h2>
    <a class ="btn btn-primary" href="pages/create.php">Tambah Catatan Baru</a>
    <br><br>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Murid</th>
                <th>Nama Bapak</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                // Looping data dari database
                while ($row = $result->fetch_assoc()) {
                    echo '<body style="background-color: #3C3D37;">';
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['judul'] . "</td>";
                    echo "<td>" . $row['isi'] . "</td>";
                    echo "<td>" . date('d-m-Y H:i', strtotime($row['created_at'])) . "</td>";
                    echo "<td>";
                    echo "<a href='./pages/edit.php?id=" . $row['id'] . "'>Edit</a> | ";
                    echo "<a href='./actions/delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah anda yakin ingin menghapus catatan ini?\");'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Belum ada catatan.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <a style="font-style: Tahoma; font-size: 60px; color: whitesmoke; text-shadow: 3px 3px 8px;" href="aboutme.html" target="_blank">About Me</a>

    <style>
        a {
                font-family: Tahoma;
            }
            table {
                border: 4px;
                border-radius: 10px;
                box-shadow: 3px 3px 8px ;
            }
            h2 {
                text-shadow: 3px 3px 8px;
            }
            btn btn-primary {
                box-shadow: 3px 3px 8px;
            }
</body>

</html>
<?php
$conn->close();
?>