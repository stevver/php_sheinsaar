<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Image Gallery</title>
  <style>
    table {
      border-collapse: collapse;
    }
    .thumbnail {
      width: 150px;
      height: 120px;
    }
  </style>
</head>
<body>

<?php
$directory = 'uploads';
$columns = 3;

echo "<a href='?mode=random'>Suvaline pilt</a> | ";
echo "<a href='?mode=gallery'>Pildid</a>";
echo "<hr>";

function getScaledDimensions($imgPath, $maxWidth, $maxHeight) {
    list($origWidth, $origHeight) = getimagesize($imgPath);
    $ratio = 1;
    if ($origWidth > $maxWidth || $origHeight > $maxHeight) {
        $ratio = min($maxWidth / $origWidth, $maxHeight / $origHeight);
    }
    return [
      'width'  => round($origWidth * $ratio),
      'height' => round($origHeight * $ratio)
    ];
}

if (isset($_GET['img'])) {
    $img = $_GET['img'];
    if (file_exists("$directory/$img")) {
        echo "<h3>Pilt</h3>";
        $imgPath = "$directory/$img";
        $maxWidth = 800;
        $maxHeight = 600;
        $dims = getScaledDimensions($imgPath, $maxWidth, $maxHeight);
        echo "<img src='$directory/$img' alt='Selected Image' width='{$dims['width']}' height='{$dims['height']}' />";
        echo "<br><a href='?mode=gallery'>Back to Gallery</a>";
    } else {
        echo "<p>Image not found.</p>";
    }
    exit;
}

$files = array_diff(scandir($directory), array('.', '..'));

if (isset($_GET['mode']) && $_GET['mode'] === 'random') {
    if (!empty($files)) {
        $randomImage = $files[array_rand($files)];
        echo "<h3>Suvaline pilt</h3>";
        $imgPath = "$directory/$randomImage";
        $maxWidth = 800;
        $maxHeight = 600;
        $dims = getScaledDimensions($imgPath, $maxWidth, $maxHeight);
        echo "<img src='$directory/$randomImage' alt='Random Image' width='{$dims['width']}' height='{$dims['height']}' />";
    } else {
        echo "<p>No images found in the directory.</p>";
    }
} else {
    echo "<h3>Pildid</h3>";
    echo "<table border='0' cellpadding='5'>";
    $i = 0;
    foreach ($files as $file) {
        if ($i % $columns === 0) {
            echo "<tr>";
        }
        echo "<td align='center'>";
        echo "<a href='?img=$file'>";
        echo "<img src='$directory/$file' alt='$file' class='thumbnail'/>";
        echo "</a>";
        echo "</td>";
        $i++;
        if ($i % $columns === 0) {
            echo "</tr>";
        }
    }
    if ($i % $columns !== 0) {
        echo "</tr>";
    }
    echo "</table>";
}
?>

</body>
</html>