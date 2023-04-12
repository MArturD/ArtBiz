<?php
require_once "../vendor/autoload.php";

use App\QueryBuilder;
use Aura\SqlQuery\QueryFactory;
use JasonGrimes\Paginator;

$sth = new QueryBuilder();
$queryFactory = new QueryFactory('mysql');

$totalItems = $sth->getAll('posts');
$select = $queryFactory->newSelect();

$select
    ->cols(['*'])
    ->from('posts')
    ->setPaging(5)
    ->page($_GET['page'] ?? 1 );

$pdo = $sth->pdo;
$sth = $pdo->prepare($select->getStatement());
$sth->execute($select->getBindValues());
$items = $sth->fetchAll(PDO::FETCH_ASSOC);
//d($items);
//$totalItems = 1000;
$itemsPerPage = 5;
$currentPage = $_GET['page'] ?? 1;
$urlPattern = '?page=(:num)';

$paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);
foreach ($items as $item){
    echo $item['id'] . PHP_EOL . $item['title'] . '<br>';
}
?>

<html>
<head>
    <!-- The default, built-in template supports the Twitter Bootstrap pagination styles. -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>

<?php
// Example of rendering the pagination control with the built-in template.
// See below for information about using other templates or custom rendering.

echo $paginator;
?>

</body>
</html>