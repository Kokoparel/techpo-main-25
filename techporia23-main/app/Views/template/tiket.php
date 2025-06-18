<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tiket Seminar Techporia 2023</title>
        <style>
            @page {
                margin: 0px;
            }
            body {
                margin: 0px;
                padding: 0px;
                position: relative;
            }
        </style>
    </head>
    <body>
        <img src="./assets/template/tiket.png" style="position: absolute; z-index: -1; width: 100%;" />
        <img src="<?= $qrCode; ?>" style="position: absolute; z-index: 1; bottom: 59px; right: 76px; width: 250px" />
    </body>
</html>