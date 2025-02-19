<?php
include 'functions.php';
$data = getDataFromCSV('data.csv');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save'])) {
        $newData = [];
        foreach ($_POST['image'] as $index => $image) {
            $newData[] = [
                $image,
                $_POST['title'][$index],
                $_POST['subtitle'][$index],
                $_POST['text'][$index]
            ];
        }
        saveDataToCSV('data.csv', $newData);
        header('Location: admin.php');
        exit;
    }
    if (isset($_POST['add'])) {
        $data[] = ["images/default.jpg", "Uus pealkiri", "Uus alapealkiri", "Uus tekst"];
        saveDataToCSV('data.csv', $data);
        header('Location: admin.php');
        exit;
    }
    if (isset($_POST['delete'])) {
        $indexToDelete = $_POST['delete'];
        array_splice($data, $indexToDelete, 1);
        saveDataToCSV('data.csv', $data);
        header('Location: admin.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Admin Paneel</h1>
    <form method="post">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pilt</th>
                    <th>Pealkiri</th>
                    <th>Alapealkiri</th>
                    <th>Tekst</th>
                    <th>Tegevused</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $index => $row): ?>
                    <tr>
                        <td><input type="text" name="image[]" value="<?php echo $row['image']; ?>" class="form-control"></td>
                        <td><input type="text" name="title[]" value="<?php echo $row['title']; ?>" class="form-control"></td>
                        <td><input type="text" name="subtitle[]" value="<?php echo $row['subtitle']; ?>" class="form-control"></td>
                        <td><input type="text" name="text[]" value="<?php echo $row['text']; ?>" class="form-control"></td>
                        <td>
                            <button type="submit" name="delete" value="<?php echo $index; ?>" class="btn btn-danger">Kustuta</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" name="save" class="btn btn-success">Salvesta</button>
        <button type="submit" name="add" class="btn btn-primary">Lisa uus</button>
    </form>
</body>
</html>