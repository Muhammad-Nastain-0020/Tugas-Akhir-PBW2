<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <script>
        window.onload = function() {
            window.print(); // 
        }
    </script>
</head>
<body>
    <h1 style="text-align: center;"><?= $judul ?></h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pengunjung</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Waktu Kunjungan</th>
                <th>Keperluan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($pengunjung as $info): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= esc($info['id_pengunjung']); ?></td>
                    <td><?= esc($info['id_anggota']); ?></td>
                    <td><?= esc($info['nama']); ?></td>
                    <td><?= esc($info['waktu_kunjungan']); ?></td>
                    <td><?= esc($info['keperluan']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
