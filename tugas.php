<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
</head>
<body>
    <h2>Form Input Data</h2>
    <form method="post">
        <label>Nama: </label>
        <input type="text" name="nama" required>
        <br><br>
        <label>Tanggal Lahir: </label>
        <input type="date" name="tanggal_lahir" required>
        <br><br>
        <label>Pekerjaan: </label>
        <select name="pekerjaan" required>
            <option value="Programmer">Programmer</option>
            <option value="Designer">Designer</option>
            <option value="Manager">Manager</option>
        </select>
        <br><br>
        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = htmlspecialchars($_POST['nama']);
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        $tanggal_lahir_date = new DateTime($tanggal_lahir);
        $today = new DateTime();
        $umur = $today->diff($tanggal_lahir_date)->y;

        $gaji = 0;
        switch ($pekerjaan) {
            case "Programmer":
                $gaji = 8000000;
                break;
            case "Designer":
                $gaji = 6000000;
                break;
            case "Manager":
                $gaji = 10000000;
                break;
        }

        echo "<h2>Output Data</h2>";
        echo "Nama: $nama<br>";
        echo "Tanggal Lahir: $tanggal_lahir<br>";
        echo "Umur: $umur tahun<br>";
        echo "Pekerjaan: $pekerjaan<br>";
        echo "Gaji: Rp " . number_format($gaji, 0, ',', '.');
    }
    ?>
</body>
</html>
