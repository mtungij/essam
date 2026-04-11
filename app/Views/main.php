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
    <meta name="theme-color" content="#312e81">
    <link rel="manifest" href="/manifest.webmanifest">
    <link rel="apple-touch-icon" href="/image/icon-192.png">
    <link rel="stylesheet" href="/css/styles.css">
    <script defer src="/js/alpine.js"></script>
    <script defer src="/js/min.js"></script>
    <title>Esssam Digital</title>
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-900">

    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <?= $this->include('partials/navigation') ;?>

        <!-- Sidebar -->
        <?= $this->include('partials/sidebar') ;?>

        <main class="p-4 md:ml-64 h-auto pt-20">
            <?= $this->renderSection('content') ?>
        </main>
    </div>


</body>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var drawer = document.getElementById('drawer-navigation');
    if (!drawer) {
        return;
    }

    drawer.querySelectorAll('a[href]').forEach(function (link) {
        link.addEventListener('click', function () {
            if (window.innerWidth < 768) {
                drawer.classList.add('-translate-x-full');
            }
        });
    });

    // PWA install support
    var installBtn = document.getElementById('install-pwa-btn');
    var deferredPrompt = null;

    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function () {
            navigator.serviceWorker.register('/sw.js').catch(function () {});
        });
    }

    function isStandalone() {
        return window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true;
    }

    window.addEventListener('beforeinstallprompt', function (e) {
        e.preventDefault();
        deferredPrompt = e;
        if (installBtn && !isStandalone()) {
            installBtn.classList.remove('hidden');
        }
    });

    if (installBtn) {
        if (isStandalone()) {
            installBtn.classList.add('hidden');
        }

        installBtn.addEventListener('click', async function () {
            if (!deferredPrompt) {
                alert('Install is not available yet on this browser/device.\n\nRequirements:\n1) Open using HTTPS\n2) Use Chrome/Edge (Android/Desktop)\n3) App must not already be installed\n4) Visit the app for a short time so browser can enable install prompt');
                return;
            }

            deferredPrompt.prompt();
            await deferredPrompt.userChoice;
            deferredPrompt = null;
            installBtn.classList.add('hidden');
        });
    }

    window.addEventListener('appinstalled', function () {
        if (installBtn) {
            installBtn.classList.add('hidden');
        }
    });

    // On iOS Safari there is no beforeinstallprompt event.
    if (installBtn && !('BeforeInstallPromptEvent' in window) && !isStandalone()) {
        installBtn.title = 'If using iPhone: tap Share then Add to Home Screen';
    }
});
</script>
<script src="/js/flowbite.js"></script>

</html>