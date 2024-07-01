<div>
    <div id="map" style="width: 100%; height: 600px;"></div>
    <script type="text/javascript">
        window.addEventListener('load', function() {
            const colors = ['#ff0000', '#eed959' ,'#00ff00',  '#ffff00', '#0000ff'];
            const districts = @js($districts);
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

            bidangLayout = {};
            for(let i=0; i<bidangs.length; i++){
                bidangLayout[bidangs[i]['bidang']] = L.layerGroup();
            }
            let districtLayers = {};
            for(let i = 0; i<districts.length; i++){
                geoJsonData = JSON.parse(districts[i]['geojson']);
                pegawais = districts[i]['pegawais'];
                color = colors[Math.floor(Math.random() * colors.length)];
                console.log(pegawais)
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
                districtLayers[districts[i]['distrik']] = L.geoJson(getGeoJson, {
                    style: {color: color, fillColor: color},
                    onEachFeature: (feature, layer) => {
                        layer.bindPopup(feature.properties.nama);
                        layer.on('add', () => {
                            pegawais.forEach((pegawai) => {
                                if(pegawai['lokasi'] != null && pegawai['bidang'] != null){

                                    latitude = pegawai['lokasi']['latitude'];
                                    longitude = pegawai['lokasi']['longitude'];
                                    bidang = pegawai['bidang']['bidang'];
                                    nama = pegawai['nama_depan']+' '+pegawai['nama_tengah']+ ' '+pegawai['nama_belakang'];
                                    iconUrl = baseUrl+pegawai['bidang']['icon'];
                                    foto = baseUrl+pegawai['gambar'];
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
                            pegawais.forEach((pegawai) => {
                                if(pegawai['lokasi'] != null && pegawai['bidang'] != null){
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
            L.control.layers(null, districtLayers, {collapsed: false}).addTo(map);
            L.control.layers(null, bidangLayout, {collapsed: false}).addTo(map);
        });
    </script>

</div>
