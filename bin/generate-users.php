<?php 


require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();
//connexion a la db
try {
  $db = new PDO("{$_ENV['DB_CONNECTION']}:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
} catch (\PDOException $e) {
  die($e->getMessage());
}

$faker = Faker\Factory::create('fr_FR');


for ($i = 0; $i < 10; $i++) {
  $createdAt = $faker->dateTime($max = 'now', $timezone = null)->format('Y-m-d H:i:s');

  $statement = $db->prepare("INSERT INTO users (created_at, updated_at, email, password, first_name, last_name) VALUES (:created_at, :updated_at, :email, :password, :first_name, :last_name)");
  $statement->execute([
      'created_at' => $createdAt,
      'updated_at' => $faker->dateTimeBetween($startDate = $createdAt, $endDate = 'now', $timezone = null)->format('Y-m-d H:i:s'),
      'email' => $faker->email(),
      'password' => $faker->password(),
      'first_name' => $faker->firstName(),
      'last_name' => $faker->lastName(),
  ]);
}
