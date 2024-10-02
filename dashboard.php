<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.html');
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM expenses WHERE user_id = $user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Your Expenses</h1>
    <table>
        <tr>
            <th>Category</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['category'] ?></td>
                <td><?= $row['amount'] ?></td>
                <td><?= $row['date'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
