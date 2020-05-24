<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gift-Shop</title>
    <link rel="stylesheet" href="/application/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/551de25dc1.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
</head>

<body>
    <?php include "application/views/header_view.php";?>
    <div class="main container">
        <?php include "application/views/sidebar_view.php";?>
        <div class="content">
            <?php include 'application/views/'.$content_view;?>
        </div>
    </div>
    <?php include "application/views/footer_view.php"?>
    <script src="/application/js/main.js"></script>
    <script>

</script>
</body>

</html>







