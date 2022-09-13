/**
 * 変更を更新する
 */
<?php
require_once __DIR__ . "/../../db_config.php";
if (empty($_GET["id"])) {
  echo "正しいIDを入力してください。";
  exit;
}
$id = $_GET["id"];
$recipe_name = $_POST["recipe_name"];
$category = (int) $_POST["category"];
$difficulty =  (int) $_POST["difficulty"];
$budget =  (int) $_POST["budget"];
$howto = $_POST["howto"];
try {
  $dbh = new PDO("mysql:host=localhost;dbname=db1;charset=utf8", $user, $pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE `recipes` SET `recipe_name`=?,`category`=?,`difficulty`=?,`budget`=?,`howto`=? WHERE id = ?";
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(1, $recipe_name, PDO::PARAM_STR);
  $stmt->bindValue(2, $category, PDO::PARAM_INT);
  $stmt->bindValue(3, $difficulty, PDO::PARAM_INT);
  $stmt->bindValue(4, $budget, PDO::PARAM_INT);
  $stmt->bindValue(5, $howto, PDO::PARAM_STR);
  $stmt->bindValue(6, $id, PDO::PARAM_INT);
  $stmt->execute();
  $dbh = null;
  echo "ID：" . htmlspecialchars($id, ENT_QUOTES) . "の更新が完了しました。";
  echo "<a href=index.php>トップ</a>";
} catch (PDOException $e) {
  echo "エラー発生：" . htmlspecialchars($e->getMessage(), ENT_QUOTES) . "<br>";
  exit;
}
?>