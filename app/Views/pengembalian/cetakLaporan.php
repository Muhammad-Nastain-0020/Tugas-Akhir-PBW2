<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
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

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Anggota</th>
                <th scope="col">ID Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Jumlah Pinjam</th>
                <th scope="col">Jumlah kembali</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Denda</th>
            </tr>
        </thead>
            <?php $i = 1;
            foreach ($kembali as $info): ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= esc($info['id_anggota']); ?></td>
                    <td><?= esc($info['id_buku']); ?></td>
                    <td><?= esc($info['judul_buku']); ?></td>
                    <td><?= esc($info['jumlah']); ?></td>
                    <td><?= esc($info['jumlah_kembali']); ?></td>
                    <td><?= esc($info['tanggal_pinjam']); ?></td>
                    <td><?= esc($info['tanggal_kembali']); ?></td>
                    <td><?= esc($info['denda']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>