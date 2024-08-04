<div>
    <div id="map" style="width: 100%; height: 600px;"></div>

    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />

    <script type="text/javascript">
        window.addEventListener('load', function() {
            const colors = ['#ff0000', '#eed959' ,'#00ff00',  '#ffff00', '#0000ff'];
            const wilayahs = @js($wilayahs);
            const bidangs = @js($bidangs);
            const map = L.map('map').setView({lat: -2.53371, lng: 140.71813}, 12);
            const getUrl = window.location;
            const baseUrl = getUrl .protocol + "//" + getUrl.host + "/";

            map.createPane('labels');
            map.getPane('labels').style.zIndex = 650;
            map.getPane('labels').style.pointerEvents = 'none';

            const cartodbAttribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attribution">CARTO</a>';

            const positron = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: cartodbAttribution
            }).addTo(map);

            const positronLabels = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
                attribution: cartodbAttribution,
                pane: 'labels'
            }).addTo(map);

            /*
            | bidang -----------------
            */

            bidangLayout = {};
            for(let i=0; i<bidangs.length; i++){
                bidangLayout[bidangs[i]['bidang']] = L.layerGroup();
            }

            /*
            | distrik -----------------
            */
            let wilayahLayers = {};
            for(let i = 0; i<wilayahs.length; i++){
                geoJsonData = JSON.parse(wilayahs[i]['geojson']);
                lapangans = wilayahs[i]['lapangans'];
                color = colors[Math.floor(Math.random() * colors.length)];
                console.log(lapangans)
                var getGeoJson = { 
                    "type": "FeatureCollection",
                    "nama": "heram.js",
                    "features": [
                        {
                            "type": "Feature",
                            "properties": {
                            },
                            "geometry": JSON.parse(geoJsonData)
                        }
                    ]
                }

                /*
                | wilayah -----------------
                */
                wilayahLayers[wilayahs[i]['nama_wilayah']] = L.geoJson(getGeoJson, {
                    style: {color: color, fillColor: color},
                    onEachFeature: (feature, layer) => {
                        layer.bindPopup(feature.properties.nama);
                        layer.on('add', () => {
                            lapangans.forEach((lapangan) => {
                                if(lapangan['lokasi'] != null && lapangan['bidang'] != null){

                                    latitude = lapangan['lokasi']['latitude'];
                                    longitude = lapangan['lokasi']['longitude'];
                                    bidang = lapangan['bidang']['bidang'];
                                    nama = lapangan['nama_depan']+' '+lapangan['nama_tengah']+ ' '+lapangan['nama_belakang'];
                                    iconUrl = baseUrl+lapangan['bidang']['icon'];
                                    foto = baseUrl+lapangan['gambar'];
                                    L.marker([latitude,longitude], {
                                        icon: L.icon({iconUrl, iconSize: [30, 30], iconAnchor: [12, 41], popupAnchor: [1, -34]})
                                    })
                                    .bindPopup(`
                                        <b>${bidang}</b><br><img src="${foto}" alt="Profile Picture" style="width:100px;height:auto;"><br>Nama: ${nama}
                                    `).addTo(bidangLayout[bidang]);
                                }
                            })
                        });
                        layer.on('remove', () => {
                            lapangans.forEach((lapangan) => {
                                if(lapangan['lokasi'] != null && lapangan['bidang'] != null){
                                    L.marker([latitude,longitude], {
                                        icon: L.icon({iconUrl, iconSize: [30, 30], iconAnchor: [12, 41], popupAnchor: [1, -34]})
                                    })
                                    .bindPopup(`
                                        <b>${bidang}</b><br><img src="${foto}" alt="Profile Picture" style="width:100px;height:auto;"><br>Nama: ${nama}
                                    `).removeFrom(bidangLayout[bidang]);
                                }
                            });
                        });
                    }
                }).addTo(map);
                
            }
            L.control.layers(null, wilayahLayers, {collapsed: false}).addTo(map);
            L.control.layers(null, bidangLayout, {collapsed: false}).addTo(map);

            map.addControl(new L.Control.Fullscreen());
            // map.toggleFullscreen()

        });
    </script>

</div>
