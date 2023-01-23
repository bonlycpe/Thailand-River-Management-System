<?php
    //echo("Index <br>");
    if(isset($_GET['controller'])&&isset($_GET['action']))
    {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    }else{
        $controller = 'pages';
        $action = 'home';
    }

?>

<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai+Looped:wght@500&display=swap" rel="stylesheet">

    <style>
        body {
            width: 25%;
            margin: auto;
            display: table-cell;
            text-align: center;
            background-image: linear-gradient( 109.6deg, rgba(156,252,248,1) 11.2%, rgba(110,123,251,1) 91.1% );
            font-family: 'IBM Plex Sans Thai Looped', sans-serif;
        }
        .test {
            width: 25%;
            margin: auto;
            display: table-cell;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }tr:hover {background-color: coral;}

        table.center {
            margin-left: auto; 
            margin-right: auto;
            background-color: #FFFFFF;
        }

        .button {
        appearance: none;
        background-color: #FFFFFF;
        border-radius: 40em;
        border-style: none;
        box-shadow: #ADCFFF 0 -12px 6px inset;
        box-sizing: border-box;
        color: #000000;
        cursor: pointer;
        display: inline-block;
        font-family: -apple-system,sans-serif;
        font-size: 1.2rem;
        font-weight: 700;
        letter-spacing: -.24px;
        margin: 0;
        outline: none;
        padding: 1rem 1.3rem;
        quotes: auto;
        text-align: center;
        text-decoration: none;
        transition: all .15s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button:hover {
        background-color: #FFC229;
        box-shadow: #FF6314 0 -6px 8px inset;
        transform: scale(1.125);
        }

        .button:active {
        transform: scale(1.025);
        }

        @media (min-width: 768px) {
        .button {
            font-size: 1.5rem;
            padding: .75rem 2rem;
        }
        }

        .h3{
            color: #123455;
        }
              
        .button-32 {
            background-color: #000000 ;
            border-radius: 15px;
            color: #FFFFFF;
            cursor: pointer;
            font-weight: bold;
            padding: 5px 5px;
            text-align: center;
            transition: 200ms;
            width: 5%;
            box-sizing: border-box;
            border: 0;
            font-size: 16px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-32:not(:disabled):hover,
        .button-32:not(:disabled):focus {
        outline: 0;
        background: #FF5733;
        box-shadow: 0 0 0 2px rgba(0,0,0,.2), 0 3px 8px 0 rgba(0,0,0,.15);
        }

        .button-32:disabled {
        filter: saturate(0.2) opacity(0.5);
        -webkit-filter: saturate(0.2) opacity(0.5);
        cursor: not-allowed;
        }

        input{
            background-color: #fff;
                    height: 31px;
                    padding: 3px 7px;
                    line-height: normal;
                    border: 1px solid #a6a6a6;
                    border-top-color: #949494;
                    border-radius: 3px;
                    box-shadow: 0 1px 0 rgb(255 255 255 / 50%), 0 1px 0 rgb(0 0 0 / 7%) inset;
                    outline: 0;
                    color: #111;
                    font-size: 13px;
                    :focus{
                        border-color: #e77600;
                        box-shadow: 0 0 3px 2px rgb(228 121 17 / 50%);
                    }
                
                
        }

        select {
            // A reset of styles, including removing the default dropdown arrow
            appearance: none;
            // Additional resets for further consistency
            background-color: transparent;
            border: none;
            padding: 0 1em 0 0;
            margin: 0.5%;
            width: 10%;
            font-family: inherit;
            font-size: inherit;
            cursor: inherit;
            line-height: inherit;
        }
        

    </style>
</head>

<body >
    <h1>
    <br>
    <?php echo "ระบบจัดการแม่น้ำในประเทศไทย<br>";?>
    <h2 style="background-color:powderblue;" >จัดทำโดย<br>นายเฉลิมชัย กำลังเดช รหัสนิสิต 6320502363 </h2>
    <h3>
    <a href ="?controller=riverway&action=conclution" class="button">สรุปข้อมูลแม่น้ำ</a>
    <a href ="?controller=river&action=index" class="button">ข้อมูลแม่น้ำ</a>
    <a href ="?controller=riverway&action=index" class="button">เส้นทางการไหลของแม่น้ำ</a>
    <a href ="?controller=nearbycommunity&action=index" class="button">พื้นที่ย่อยใกล้แม่น้ำ</a>
    <?php require_once("routes.php");?>
</body>
</html>
