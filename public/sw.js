self.addEventListener('install', (event) => {
  self.skipWaiting();
});

self.addEventListener('activate', (event) => {
  event.waitUntil(self.clients.claim());
});

// Minimal service worker for installability; add caching here if needed later.
self.addEventListener('fetch', () => {});
