<!DOCTYPE html>
<html>
<head>

    <title>Mon Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        td{
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>
<body class="index-body">
<div class="container-fluid">

    <header class="row mb-3 main-header">
        <div class="col py-4 text-center">
            <a href="/articles"><b>Mon Blog</b></a>
        </div>
    </header>

    <div class="row my-3 index-content">
        <?= $content ?>
    </div>

</div>
</body>
</html>
