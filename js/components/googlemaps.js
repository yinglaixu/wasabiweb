
/*

Dependancies: _goooglemaps.scss, json-settings/googlemaps/*.json

<div class="googlemap">
    <div class="googlemap__inner">
        <div class="googlemap__map js-googlemap"
            data-marker-url="<?php bloginfo('template_directory'); ?>/build/img/map-marker.png"
            data-map-settings="<?php bloginfo('template_directory'); ?>/json-settings/googlemaps/googlemaps-1.json">              
        </div>
    </div>
</div>


You can add multiple maps by creating more map.json files, and linking to them
via the data-map-settings data-attribute on the maps HTML.

You can add multiple markers to any map by appending to the locations array within
the maps corresponding map.json file.

*/

WW.googlemaps = function($) {
    'use strict';    

    const createMap = (googlemap) => {

        //const jsonLocation = googlemap.getAttribute('data-map-settings');
        let map;
        /*$.getJSON(jsonLocation)
            .done(data => {
                initialize(data.map);
            }).fail(err => {
                console.warn('Possible error in JSON file or not loaded. \nError: ' + err);
            });*/

        /*$.ajax({
            url: settings.ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action:     'jsonencode_map_params',
                security:   settings.security,
                country:    settings.country,
                city:       settings.city,
                order:      settings.order,
                postid:     settings.postid,
                single:     settings.single
            },
            success: function(data) {
                initialize(data.map);
            },
            error: function (err) {
                console.warn('Possible error in JSON file or not loaded. \nError: ' + err);
            }
        });*/



        const initialize = mapConfig => {

            const latLang = new google.maps.LatLng(mapConfig.mapParams.longitude, 
                    mapConfig.mapParams.latitude),
                MY_MAPTYPE_ID = 'custom_style';
            let featureOpts,
                mapOptions,
                styledMapOptions,
                customMapType;

            mapOptions = {
                center: latLang,
                zoom: mapConfig.mapParams.zoom,
                draggable: true,
                scrollwheel: false,
                panControl: false,
                mapTypeControl: false,
                zoomControl: true,
                streetViewControl: true,
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
                },
                mapTypeId: MY_MAPTYPE_ID
            };

            featureOpts = [
                /* example feature option
                {
                    featureType: 'road.highway',
                    elementType: "geometry",
                    stylers: [
                        { color: '#356751'},
                        {weight: 0.5}
                    ]
                }
                find more feature options http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html
                */
            ];

            styledMapOptions = {
                name: 'Custom Style'
            };

            customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
            map = new google.maps.Map(googlemap,mapOptions);
            map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

            if (WW.isTouch) {
                map.setOptions({
                    draggable: false
                });
            }
            
            mapConfig.locations.forEach(createMarker);
        };

        const createMarker = location => {
            let infowindow = new google.maps.InfoWindow(),
                longitude = location.longitude,
                latitude = location.latitude,
                imageLocation = googlemap.getAttribute('data-marker-url'),
                image,
                marker;

            image = new google.maps.MarkerImage(imageLocation,
                // This marker is 21 pixels wide by 30 pixels tall.
                new google.maps.Size(32, 42),
                // The origin for this image is 0,0.
                new google.maps.Point(0,0),
                // The anchor for this image is the base of the flagpole at 18,42.
                new google.maps.Point(16, 42)
            );

            marker = new google.maps.Marker({
                map: map,
                position: {
                    lat: longitude, 
                    lng: latitude
                },
                visible: true,
                icon: image // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
            });

            if (location.img) {
                infowindow.setContent(`
                    <div class="c-googlemaps__info-window">
                        <ul class="c-googlemaps__info-window__list o-bare-list">
                            <li class="c-googlemaps__info-window__img"> 
                                <a href="${location.url}">
                                    <img src="${location.img}" alt=""> 
                                </a>
                            </li>
                            <li>
                                <h2 class="u-flush--bottom u-txt-md">
                                    ${location.area}
                                </h2>
                            </li>
                            <li> 
                                ${location.street} 
                            </li>
                            <li class="u-txt-md u-txt-brand">
                                ${location.price}
                            </li>
                        </ul>
                    </div>
                `);                
            } else {
                infowindow.setContent(`
                    <div class="c-googlemaps__info-window">
                        <ul class="c-googlemaps__info-window__list o-bare-list">
                            <li>
                                <h2 class="u-flush--bottom u-txt-md">
                                    ${location.area}
                                </h2>
                            </li>
                            <li> 
                                ${location.street} 
                            </li>
                            <li class="u-txt-md u-txt-brand">
                                ${location.price}
                            </li>
                        </ul>
                    </div>
                `);  
            }

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, this);
            });
        };

        initialize( mapInformationForListing.map );
    };

    const maps = document.querySelectorAll('.js-googlemap');
    [].forEach.call(maps, map => {
        createMap(map);
    });
    
    return this;
};

// add .googlemaps($) to main.js