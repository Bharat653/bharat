<!DOCTYPE html>
<html>
<head>
    <title>Simple Form</title>
</head>
<body>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="number">Number:</label>
        <input type="text" name="number" id="number" required>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <h2>Entered Data:</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Action</th>
        </tr>
        <?php
        session_start();

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $number = $_POST['number'];

            if (!isset($_SESSION['data'])) {
                $_SESSION['data'] = [];
            }

            array_push($_SESSION['data'], ['name' => $name, 'number' => $number]);
        }

        if (isset($_SESSION['data'])) {
            foreach ($_SESSION['data'] as $index => $user) {
                echo '<tr>';
                echo '<td>' . $user['name'] . '</td>';
                echo '<td>' . $user['number'] . '</td>';
                echo '<td><a href="edit.php?index=' . $index . '">Edit</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
</body>
</html>
