<!DOCTYPE html>
<html>
<head>
    <title>Caesar Cipher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        p {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Caesar Cipher</h1>

    <form method="post">
        <label for="text">Masukkan Teks:</label>
        <input type="text" id="text" name="text" required><br><br>

        <label for="shift">Pergeseran (angka):</label>
        <input type="number" id="shift" name="shift" required><br><br>

        <input type="radio" id="encrypt" name="action" value="encrypt" checked>
        <label for="encrypt">Enkripsi</label>

        <input type="radio" id="decrypt" name="action" value="decrypt">
        <label for="decrypt">Dekripsi</label><br><br>

        <input type="submit" value="Proses">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
        $shift = (int)$_POST["shift"];
        $action = $_POST["action"];
        $result = "";

        if ($action == "encrypt") {
            for ($i = 0; $i < strlen($text); $i++) {
                $char = $text[$i];
                if (ctype_alpha($char)) {
                    $result .= chr((ord($char) - ord('a') + $shift) % 26 + ord('a'));
                } else {
                    $result .= $char;
                }
            }
        } elseif ($action == "decrypt") {
            for ($i = 0; $i < strlen($text); $i++) {
                $char = $text[$i];
                if (ctype_alpha($char)) {
                    $result .= chr((ord($char) - ord('a') - $shift + 26) % 26 + ord('a'));
                } else {
                    $result .= $char;
                }
            }
        }

        echo "<center><p>Hasil: $result</p>";
    }
    ?>
</body>
