<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border="1">
    <tr>
        <th>Id Pengajuan</th>
        <th>Nama Proyek</th>
        <th>Status</th>
    </tr>
    <?php foreach($obj as $o){ ?>
    <tr>
        <td><?= $o->id_pengajuan ?></td>
        <td><?= $o->nama_proyek ?></td>
        <td><?= $o->status ?></td>
    </tr>
    <?php } ?>
</table>
    
</body>
</html>