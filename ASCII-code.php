
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASCII Code</title>
    <style>
        .ascii {
            background-color: #fff;
            width: 600px;
            margin: 0 auto;
            text-align: center;
            display: flex;
            flex-wrap: wrap;
        }

        body {
            background-color: #ddd;
            margin: 50px 0;
        }

        .box {
            flex: 1 0 40%;
            padding: 2%;
            border: 1px solid #efefef;
        }
    </style>
</head>
<body>
    <div class="ascii">
        <?php
            for($i=0; $i<128;$i++){
        ?>
        <div class="box">
            <div><?php printf("ASCII Code: %s = %s", $i, chr($i)); ?></div>
        </div>
        <?php
            }
        ?>
    </div>
</body>
</html>
