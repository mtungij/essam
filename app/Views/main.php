<?php 

function format_date($date)
{
    return date('d/m/Y H:m', strtotime($date));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <script defer src="/js/alpine.js"></script>
    <script defer src="/js/min.js"></script>
    <title>Esssam Digital</title>
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-900>

    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <?= $this->include('partials/navigation') ;?>

        <!-- Sidebar -->
        <?= $this->include('partials/sidebar') ;?>

        <main class="p-4 md:ml-64 h-auto pt-20">
            <?= $this->renderSection('content') ?>
        </main>
    </div>


</body>
<script src="/js/flowbite.js"></script>

</html>