<?php
session_start();
include('config.php');

// Handle login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_user && password_verify($password, $admin_pass)) {
        $_SESSION['loggedin'] = true;
    } else {
        $error = "Invalid credentials!";
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit;
}

// Handle CSV operations
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $data = array_map('str_getcsv', file('data.csv'), array_fill(0, count(file('data.csv')), ';'));

    // Add new entry
    if (isset($_POST['add'])) {
        $new_entry = [$_POST['image'], $_POST['title'], $_POST['subtitle'], $_POST['text1'], $_POST['text2'], $_POST['text3'], $_POST['text4'], $_POST['text5']];
        $data[] = $new_entry;
        $fp = fopen('data.csv', 'w');
        foreach ($data as $row) {
            fputcsv($fp, $row, ';');
        }
        fclose($fp);
    }

    // Edit entry
    if (isset($_POST['edit'])) {
        $index = $_POST['index'];
        $data[$index] = [$_POST['image'], $_POST['title'], $_POST['subtitle'], $_POST['text1'], $_POST['text2'], $_POST['text3'], $_POST['text4'], $_POST['text5']];
        $fp = fopen('data.csv', 'w');
        foreach ($data as $row) {
            fputcsv($fp, $row, ';');
        }
        fclose($fp);
    }

    // Delete entry
    if (isset($_POST['delete'])) {
        $index = $_POST['index'];
        unset($data[$index]);
        $data = array_values($data);
        $fp = fopen('data.csv', 'w');
        foreach ($data as $row) {
            fputcsv($fp, $row, ';');
        }
        fclose($fp);
    }
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            color: #c3c3c3;
            font-size: 20px;
            text-decoration: none;
        }
        .scroll-to-top:hover {
            color: #a4a4a4;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <h1 class="mb-4">Admin Page</h1>
            <a href="admin.php?logout=true" class="btn btn-danger mb-4">Logout</a>
            <a href="avaleht.php" class="btn btn-secondary mb-4">Back to Main Page</a>
            <hr>
            <h2>Data Entries</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Entry 1</th>
                            <th>Entry 2</th>
                            <th>Entry 3</th>
                            <th>Entry 4</th>
                            <th>Entry 5</th>
                            <th>Entry 6</th>
                            <th>Entry 7</th>
                            <th>Entry 8</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $index => $row): ?>
                            <tr>
                                <?php foreach ($row as $cell): ?>
                                    <td><?php echo htmlspecialchars($cell); ?></td>
                                <?php endforeach; ?>
                                <td>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                                        <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <button class="btn btn-warning btn-sm" onclick="editEntry(<?php echo $index; ?>)">Edit</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <h2>Add New Entry</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="image" class="form-label">Entry 1</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Entry 2</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="subtitle" class="form-label">Entry 3</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" required>
                </div>
                <div class="mb-3">
                    <label for="text1" class="form-label">Entry 4</label>
                    <input type="text" class="form-control" id="text1" name="text1" required>
                </div>
                <div class="mb-3">
                    <label for="text2" class="form-label">Entry 5</label>
                    <input type="text" class="form-control" id="text2" name="text2">
                </div>
                <div class="mb-3">
                    <label for="text3" class="form-label">Entry 6</label>
                    <input type="text" class="form-control" id="text3" name="text3">
                </div>
                <div class="mb-3">
                    <label for="text4" class="form-label">Entry 7</label>
                    <input type="text" class="form-control" id="text4" name="text4">
                </div>
                <div class="mb-3">
                    <label for="text5" class="form-label">Entry 8</label>
                    <input type="text" class="form-control" id="text5" name="text5">
                </div>
                <button type="submit" name="add" class="btn btn-primary">Add Entry</button>
            </form>
            <hr>
            <h2>Edit Entry</h2>
            <form method="post" id="editForm" style="display:none;">
                <input type="hidden" name="index" id="editIndex">
                <div class="mb-3">
                    <label for="editImage" class="form-label">Entry 1</label>
                    <input type="text" class="form-control" id="editImage" name="image" required>
                </div>
                <div class="mb-3">
                    <label for="editTitle" class="form-label">Entry 2</label>
                    <input type="text" class="form-control" id="editTitle" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="editSubtitle" class="form-label">Entry 3</label>
                    <input type="text" class="form-control" id="editSubtitle" name="subtitle" required>
                </div>
                <div class="mb-3">
                    <label for="editText1" class="form-label">Entry 4</label>
                    <input type="text" class="form-control" id="editText1" name="text1" required>
                </div>
                <div class="mb-3">
                    <label for="editText2" class="form-label">Entry 5</label>
                    <input type="text" class="form-control" id="editText2" name="text2">
                </div>
                <div class="mb-3">
                    <label for="editText3" class="form-label">Entry 6</label>
                    <input type="text" class="form-control" id="editText3" name="text3">
                </div>
                <div class="mb-3">
                    <label for="editText4" class="form-label">Entry 7</label>
                    <input type="text" class="form-control" id="editText4" name="text4">
                </div>
                <div class="mb-3">
                    <label for="editText5" class="form-label">Entry 8</label>
                    <input type="text" class="form-control" id="editText5" name="text5">
                </div>
                <button type="submit" name="edit" class="btn btn-warning">Save Changes</button>
            </form>
        <?php else: ?>
            <h1>Login</h1>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
                <a href="avaleht.php" class="btn btn-secondary">Back to Main Page</a>
            </form>
        <?php endif; ?>
    </div>

    <script>
        function editEntry(index) {
            const data = <?php echo json_encode($data); ?>;
            document.getElementById('editIndex').value = index;
            document.getElementById('editImage').value = data[index][0];
            document.getElementById('editTitle').value = data[index][1];
            document.getElementById('editSubtitle').value = data[index][2];
            document.getElementById('editText1').value = data[index][3];
            document.getElementById('editText2').value = data[index][4];
            document.getElementById('editText3').value = data[index][5];
            document.getElementById('editText4').value = data[index][6];
            document.getElementById('editText5').value = data[index][7];
            document.getElementById('editForm').style.display = 'block';
        }
    </script>
</body>
</html>