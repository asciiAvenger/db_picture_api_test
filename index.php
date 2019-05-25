<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Picture db api test</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

    <?php
        require_once './api/insert.php';
        require_once './api/api.config.php';

        if (isset($_POST['submit-button']) and isset($_POST['name']) and isset($_FILES['image'])) {
            $name = $_POST['name'];
            $type = $_FILES['image']['type'];
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            insert_image($name, $type, $image_data);
        }
    ?>

    <section class="section">
        <div class="container">
            <h1>db_picture_test_api</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 l10 offset-l1 xl8 offset-xl2">
                        <input name="name" id="name" type="text">
                        <label for="name">Name your image</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 l10 offset-l1 xl8 offset-xl2">
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                </div>
                <div class="center">
                    <input name="submit-button" type="submit" value="Submit" class="btn">
                </div>
            </form>
        </div>
    </section>

    <!-- display all images -->

    <section class="section">
        <div class="container">
            <div class="row">

                <?php
                    global $db_connection;
                    $db = new PDO("mysql:host={$db_connection['host']};dbname={$db_connection['dbname']}", $db_connection['username'], $db_connection['password']);

                    $rs = $db->query('select image_id, image_name from images');
                    foreach ($rs as $row) {
                        echo '<p>' . $row['image_name'] . '</p><img class="materialboxed responsive-img" data-caption="' . $row['image_name'] . '" src="http://localhost/db_picture_api_test/api/retrieve.php?id=' . $row['image_id'] . '">';
                    }
                ?>

            </div>
        </div>
    </section>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('.materialboxed');
            const instances = M.Materialbox.init(images);
        });
    </script>
</body>
</html>