// Copyright 2016 Google Inc.
// 
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
// 
//      http://www.apache.org/licenses/LICENSE-2.0
// 
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

var dataCacheName = 'project-Data-v1';
var cacheName = 'project-PWA-v1';
var filesToCache = [
  '/',
  '/about',
  '/clinics',
  '/gallery',
  '/doctors',
  '/career',
  '/contact',

  '/aihms/brochure/aihms_brchr_2013.pdf',
  '/aihms/css/stylesheet.css',
  '/aihms/css/font-awesome.css',
  '/aihms/css/bootsnav.css',
  '/aihms/css/settings.css',
  '/aihms/css/aos.css',
  '/aihms/css/main.css',
  '/aihms/css/jquery.fancybox.css?v=2.1.5',
  '/md/favicon.ico',

  '/aihms/js/jquery-2.1.0.min.js',
  '/aihms/js/bootstrap.min.js',
  '/aihms/js/bootsnav.js',
  '/aihms/js/aos.js',
  '/aihms/js/jquery.themepunch.tools.min.js',
  '/aihms/js/jquery.themepunch.revolution.min.js',
  '/aihms/js/jquery.fancybox.pack.js?v=2.1.5',
  
  '/aihms/images/slider/slider1.jpg',
  '/aihms/images/slider/slider2.jpg',
  '/aihms/images/slider/slider3.jpg',
  '/aihms/images/slider/slider4.jpg',

  '/aihms/images/om.png',
  '/aihms/images/ov.png',
  '/aihms/images/abt-lft.jpg',
  '/aihms/images/search.png',
  '/aihms/images/call.png',
  '/aihms/images/aihms-logo.png',
  '/aihms/images/banner-bg.jpg',
  '/aihms/images/clinic-bg.jpg',
  '/aihms/images/clock.png',
  '/aihms/images/facilities.png',
  '/aihms/images/grabbing.png',
  '/aihms/images/icon-franchises.png',
  '/aihms/images/left-arrow-left-hi.png',
  '/aihms/images/left-arrow-right-hi.png',
  '/aihms/images/loc-map.png',
  '/aihms/images/msg.png',
  '/aihms/images/net-loc.png',
  '/aihms/images/net-tel.png',
  '/aihms/images/Doctors.jpg',
  '/aihms/images/whyte.png',
  '/aihms/images/phone.png',
  '/aihms/images/online-booking.png',

  '/aihms/images/academy/leaf.png',
  '/aihms/images/doctors/asthma.jpg',
  '/aihms/images/doctors/allergy_bg.jpg',

  '/aihms/images/about/about_green.jpg',
  '/aihms/images/about/download_icon.png',
  '/aihms/images/about/mission_icon.png',
  '/aihms/images/about/vision_icon.png',

  '/aihms/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
  '/aihms/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker-standalone.css',
  '/aihms/bower_components/moment/min/moment.min.js',
  '/aihms/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.js',

  // '/aihms/images/academy/clinics_banner.jpg',
  'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js',
  
  '/aihms/js/mixitup.js',
  'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js',

  'https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800',
  'https://fonts.googleapis.com/css?family=Open+Sans:300,400',
  'https://fonts.googleapis.com/css?family=Playfair+Display:400,700',
  'https://fonts.googleapis.com/css?family=Bree+Serif',
];

self.addEventListener('install', function(e) {
  console.log('ServiceWorker Install');
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      // console.log('ServiceWorker Caching app shell');
      return cache.addAll(filesToCache);
    }).then(() => {
      // console.log('done');
      return self.skipWaiting();
    })
  );
});

self.addEventListener('activate', function(e) {
  console.log('ServiceWorker Activate');
  e.waitUntil(
    caches.keys().then(function(keyList) {
      return Promise.all(keyList.map(function(key) { 
        if (key !== cacheName && key !== dataCacheName) {
          // console.log('ServiceWorker Removing old cache', key);
          return caches.delete(key);
        }
      }));
    })
  );
  /*
   * Fixes a corner case in which the app wasn't returning the latest data.
   * You can reproduce the corner case by commenting out the line below and
   * then doing the following steps: 1) load app for first time so that the
   * initial New York City data is shown 2) press the refresh button on the
   * app 3) go offline 4) reload the app. You expect to see the newer NYC
   * data, but you actually see the initial data. This happens because the
   * service worker is not yet activated. The code below essentially lets
   * you activate the service worker faster.
   */
  return self.clients.claim();
});




self.addEventListener('fetch', function(e) {
  // console.log('Service Worker Fetch', e.request.url);
  var dataUrl = 'https://query.yahooapis.com/v1/public/yql';
  if (e.request.url.indexOf(dataUrl) > -1) {
    /*
     * When the request URL contains dataUrl, the app is asking for fresh
     * weather data. In this case, the service worker always goes to the
     * network and then caches the response. This is called the "Cache then
     * network" strategy:
     * https://jakearchibald.com/2014/offline-cookbook/#cache-then-network
     */
    e.respondWith(
      caches.open(dataCacheName).then(function(cache) {
        return fetch(e.request).then(function(response){
          cache.put(e.request.url, response.clone());
          return response;
        });
      })
    );
  } else {
    /*
     * The app is asking for app shell files. In this scenario the app uses the
     * "Cache, falling back to the network" offline strategy:
     * https://jakearchibald.com/2014/offline-cookbook/#cache-falling-back-to-network
     */
    e.respondWith(
      caches.match(e.request).then(function(response) {
        if (response) {
          // console.log('Found ', e.request.url, ' in cache');
          return response;
        }
       return fetch(e.request);
        
      })
    );
  }
});
