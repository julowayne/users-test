<?php


require __DIR__ . "/../vendor/autoload.php";


use App\Models\User;
use App\Models\Model;


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();


//connexion a la db
try {
    $db = new PDO("{$_ENV['DB_CONNECTION']}:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
} catch (\PDOException $e) {
    die($e->getMessage());
}

$query = $db->query('SELECT * FROM users');
$users = $query->fetchAll(PDO::FETCH_CLASS, User::class);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<div class="p-5">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Date</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Last login</th>
                <th>JSON</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->getCreatedAt()->format('d/m/Y') ?></td>
                    <td><?= $user->getFullName()  ?></td>
                    <td><?= $user->getEmail() ?></td>
                    <td><?= $user->getUpdatedAt()->diffForHumans() ?></td>
                    <td><?= $user ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>

</html>

