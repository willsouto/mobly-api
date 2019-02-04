<?php include 'includes/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        table { border: 2px solid #414141; width: 100%; max-width: 960px; margin: 40px auto;}
        td { border: 1px solid #999; padding: 6px 9px;text-align: left;}
        td:first-child { width: 100px;}
        h1 { text-align: center; }
        h1, p, h2, td { font-family: "Helvetica"; }
        a { padding: 6px;transition: all 0.3s; text-decoration: none;margin: 12px 20px; background: #fff; border: 2px solid #ff4600; border-radius: 3px; color: #ff4600; width: 140px; line-height: 20px; cursor: pointer;display: inline-block;}
        a:hover { background: #ff4600; color: #fff;}
        body { margin-top: 120px;text-align: center; }
        button { display: block; margin: 20px auto; width: 200px; cursor: pointer; }
        input[type="text"] { width: 400px; border-radius: 2px; border: 1px solid #999; padding: 10px;}
        .header { border-bottom: 2px solid #999; margin-bottom: 40px; position: fixed; top: 0; width: 100%; background: #fff;}
        .header a { color: #fff; background: #414141; border-color: #000;  padding: 5px;}
        .header a:hover { background: #fff; color: #000;}
    </style>
</head>
<body>
<div class="header"><a href="/mobly/">Home</a> <a href="/mobly/listar/">Listar Usuarios</a> <a href="/mobly/adicionar/">Adicionar Usuario</a></div>