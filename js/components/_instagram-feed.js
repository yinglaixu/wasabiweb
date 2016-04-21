/*------------------------------------*\
    #INSTAGRAM-FEED 
\*------------------------------------*/

/*


<div id="instagram-feed"
    data-instagram-feed-settings="<?php bloginfo('template_directory'); ?>/json-settings/instagram-feed.json">
</div>


http://jelled.com/instagram/lookup-user-id - instagram id lookup
*/


// WW.instagramFeed = function($) {
//     'use strict';

//     const loadSettings = () => {
//         const feed = document.querySelector('#instagram-feed');
//         if (feed) {
//             let settingsLocation = feed.getAttribute('data-instagram-feed-settings');
//             $.getJSON(settingsLocation)
//                 .done(data => {
//                     return loadPhotos(data.instagram);
//                 }).fail(() => {
//                     throw (`Failed to load ${settingsLocation}
//                     Possible error in JSON syntax.`);
//                 });            
//         }
//     };

//     const loadPhotos = settings => {
//         const seg1 = 'https://api.instagram.com/v1/users/',
//             seg2 = '/media/recent/?count=',
//             seg3 = '&access_token=',
//             seg4 = '&callback=?';
//         const path = seg1 + settings.userID + seg2 + settings.photoQty + seg3 + settings.accessToken + seg4;
//         $.getJSON(path)
//             .done(data => {
//                 appendPhotos(data);
//             }).fail(() =>{
//                 throw (`Failed to load instagram photos`);
//             });
//     };

//     const appendPhotos = data => {
//         const images = data.data;
//         let html = '';
//         images.forEach(photo => {
//             html += `
//                 <div>
//                     <a href="${photo.link}" target="_blank">
//                         <img src="${photo.images.thumbnail.url}" alt="">
//                     </a>
//                 </div>
//             `;
//         });
//         $('#instagram-feed').html(html);
//     };

//     loadSettings();

//     return this;
// };

//add .instagramFeed($) to main.js