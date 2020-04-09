<?php


include_once "scrambler-functions.php";
$task = 'encode';

if (isset($_GET['task']) && $_GET['task'] != '') {
    $task = $_GET['task'];
}
$key = "abcdefghijklmnopqrstuvwxyz1234567890";
if ('key' == $task) {
    $key_original = str_split($key);
    shuffle($key_original);
    $key = join('', $key_original);
}else if (isset($_POST['key']) && $_POST['key'] != '') {
    $key = $_POST['key'];
}




$scrambledData = '';

if('encode' == $task){
    $data = $_POST['data'] ?? '';
    if($data != ''){
        $scrambledData = scrambledData($data, $key);
    }
}


if('decode' == $task){
    $data = $_POST['data'] ?? '';
    if($data != ''){
        $scrambledData = decodeData($data, $key);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data scrambler</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
    <style>
        body {
            margin-top: 50px;
        }

        textarea {
            width: 100%;
            height: 160px;
        }

        .hidden {
            display: none
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h1>Data Scrambler</h1>
                <p>Use this application to scramble your data</p>
                <p>
                    <a href="/?task=encode">Encode</a> |
                    <a href="/?task=decode">Decode</a> |
                    <a href="/?task=key">Generate Key</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <form action="index.php<?php if('decode' == $task){echo '?task=decode';}?>" method="POST" >
                    <label for="key">key</label>
                    <input type="text" id="key" name="key" <?php displayKey($key);?>>
                    <label for="data">Data</label>
                    <textarea id="data" name="data"><?php
                        if(isset($_POST['data'])){
                            echo $_POST['data'];
                        }
                    ?></textarea>
                    <label for="result">Result</label>
                    <textarea id="result" name="result"><?php echo $scrambledData; ?></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>