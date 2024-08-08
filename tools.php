<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect Buttons</title>
    <style>
        body {
            background-image: url('srs.jpg'); /* Replace with your background image */
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            display: flex;
            justify-content: space-between;
            width: 50%;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .button:hover {background-color: #3e8e41}

        .button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
</head>
<body>

    <form method="post">
        <button type="submit" name="google" class="button">Go to Google</button>
        <button type="submit" name="youtube" class="button">Go to YouTube</button>
        <button type="submit" name="facebook" class="button">Go to Facebook</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['google'])) {
                header("Location: https://www.google.com");
                exit();
            } elseif (isset($_POST['youtube'])) {
                header("Location: https://www.youtube.com");
                exit();
            } elseif (isset($_POST['facebook'])) {
                header("Location: https://www.facebook.com");
                exit();
            }
        }
    ?>

</body>
</html>

