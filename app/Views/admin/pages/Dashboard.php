<?php
$admin = $params['admin'];
$data = $params['data'] ?? [];
$currentPage = $_GET['offset'] ?? 1; // az aktuális oldalszámva
$totalPages = (int)$data['numOfPage'] ?? 1; // összes oldalszám
$searchParameter = isset($_GET['date']) ? '?date=' . $_GET['date'] : '';
?>


<?php include 'app/Views/admin/pages/Table.php' ?>