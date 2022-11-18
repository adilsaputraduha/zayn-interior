<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOMPRE</title>
</head>

<body>
    <form action="<?= base_url('kompre/save') ?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" id="id">
        <br>
        <br>
        <input type="file" name="upload" id="upload">
    </form>
</body>

</html>