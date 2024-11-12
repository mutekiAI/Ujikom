<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST['admin_id'];
    $admin_name = $_POST['admin_name'];
    $isi_komentar = $_POST['isi_komentar'];
    $image_id = $_POST['image_id'];

    $stmt = $conn->prepare("INSERT INTO komentar_foto (KomentarID, image_id, admin_id, admin_name, isi_komentar, tanggal_komentar) VALUES (?, ?, ?, ?)");
    $stmt->bind_param(null, $image_id, $admin_id, $admin_name, $isi_komentar, now());

    if ($stmt->execute()) {
        echo "Komentar berhasil disimpan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
