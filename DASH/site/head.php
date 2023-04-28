<?php include("./../../settings/variables.php"); ?>
<?php
$variables = new Variables();
$url = $variables->url;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url; ?>/css/dashboard.css">
</head>