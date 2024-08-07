<div>
    <div x-data="mapComponent()" >
        <div class="form-item flex gap-4">
            <div class="w-1/4">
                <label for="wilayah-id" class="block mb-2 text-sm font-medium text-gray-900 ">Wilayah</label>
                <select id="wilayah-id" x-model="selectedWilayah" @change="updateMap()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Semua</option>
                    <template x-for="wilayah in wilayahs" :key="wilayah.nama_wilayah">
                        <option :value="wilayah.nama_wilayah" x-text="wilayah.nama_wilayah"></option>
                    </template>
                </select>
            </div>
            <div class="w-1/4">
                <label for="lapangan-id" class="block mb-2 text-sm font-medium text-gray-900 ">Lapangan</label>
                <select id="lapangan-id" x-model="selectedLapangan" @change="updateMapLapangan()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Semua</option>
                    <template x-for="lapangan in lapangans" :key="lapangan.id">
                        <option :value="lapangan.id" x-text="lapangan.nama_lapangan"></option>
                    </template>
                </select>
            </div>

            <div class="w-1/4">
                <label for="tahun-id" class="block mb-2 text-sm font-medium text-gray-900 ">Tahun</label>
                <select id="tahun-id" x-model="selectedTahun" @change="updateMapTahun()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Semua</option>
                    <template x-for="tahun in tahuns" :key="tahun">
                        <option :value="tahun" x-text="tahun"></option>
                    </template>
                </select>
            </div>
        </div>
        <div id="map" style="width: 100%; height: 600px;"></div>
    </div>

    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />

    <script>
        function mapComponent() {
            return {
                wilayahs: @entangle('wilayahs'),
                tahuns: @entangle('tahuns'),
                lapangans: @entangle('lapangans'),
                map: null,
                colors: ['#ff0000', '#eed959', '#00ff00', '#ffff00', '#0000ff'],
                selectedWilayah: '',
                selectedLapangan: '',
                selectedTahun: '',
                wilayahLayers: {},
                lapanganLayout: {},
                baseUrl: window.location.protocol + "//" + window.location.host + "/",
    
                init() {
                    this.map = L.map('map').setView({lat: -2.53371, lng: 140.71813}, 12);
    
                    this.map.createPane('labels');
                    this.map.getPane('labels').style.zIndex = 650;
                    this.map.getPane('labels').style.pointerEvents = 'none';
    
                    const cartodbAttribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attribution">CARTO</a>';
    
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: cartodbAttribution
                    }).addTo(this.map);
    
                    L.tileLayer('http://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
                        attribution: cartodbAttribution,
                        pane: 'labels'
                    }).addTo(this.map);
    
                    this.initLayers();
                },
    
                initLayers() {
                    for (let i = 0; i < this.lapangans.length; i++) {
                        this.lapanganLayout[this.lapangans[i]['id']] = L.layerGroup();
                    }
    
                    for (let i = 0; i < this.wilayahs.length; i++) {
                        try {
                            let geoJsonData = JSON.parse(this.wilayahs[i]['geojson']);
                            let lapangans = this.wilayahs[i]['lapangans'];
                            let color = this.colors[Math.floor(Math.random() * this.colors.length)];
    
                            let getGeoJson = {
                                "type": "FeatureCollection",
                                "nama": "heram.js",
                                "features": [{
                                    "type": "Feature",
                                    "properties": {},
                                    "geometry": JSON.parse(geoJsonData)
                                }]
                            };
    
                            this.wilayahLayers[this.wilayahs[i]['nama_wilayah']] = L.geoJson(getGeoJson, {
                                style: { color: color, fillColor: color },
                                onEachFeature: (feature, layer) => {
                                    layer.bindPopup(feature.properties.nama);
                                    layer.on('add', () => {
                                        lapangans.forEach((lapangan) => {
                                            lapangan.kontrak.forEach((kontrak) => {
                                                if (kontrak) {
                                                    let latitude = kontrak['latitude'];
                                                    let longitude = kontrak['longitude'];
                                                    let iconUrl = this.baseUrl+'assets/location-pin.png';
                                                    let nama = `${kontrak['pegawai']['nama_depan']} ${kontrak['pegawai']['nama_tengah']} ${kontrak['pegawai']['nama_belakang']}`;
                                                    let foto = '';
                                                    L.marker([latitude, longitude], {
                                                        icon: L.icon({ iconUrl, iconSize: [30, 30], iconAnchor: [12, 41], popupAnchor: [1, -34] })
                                                    })
                                                    .bindPopup(`
                                                        <b>Detail Pegawai</b><br>Nama: ${nama}
                                                    `).addTo(this.lapanganLayout[lapangan['id']]);
                                                }
                                            })
                                            this.lapanganLayout[lapangan['id']].addTo(this.map);
                                        });
                                    });
                                    // layer.on('remove', () => {
                                    //     lapangans.forEach((lapangan) => {
                                    //         lapangan.kontrak.forEach((kontrak) => {
                                    //             if (kontrak) {
                                    //                 L.marker([latitude, longitude], {
                                    //                     icon: L.icon({ iconUrl, iconSize: [30, 30], iconAnchor: [12, 41], popupAnchor: [1, -34] })
                                    //                 })
                                    //                 .bindPopup(`
                                    //                     <b>${bidang}</b><br><img src="${foto}" alt="Profile Picture" style="width:100px;height:auto;"><br>Nama: ${nama}
                                    //                 `).removeFrom(this.lapanganLayout[bidang]);
                                    //             }
                                    //         })
                                    //     });
                                    // });
                                }
                            });
                        } catch (e) {
                            console.error(`Invalid GeoJSON for wilayah: ${this.wilayahs[i]['nama_wilayah']}`, e);
                        }
                    }
    
                    this.updateMap();
                },

                updateMapTahun() {
                    for (let key in this.lapanganLayout) {
                        this.map.removeLayer(this.lapanganLayout[key]);
                    }
                    if (this.selectedTahun) {
                        console.log('test');
                        this.lapangans.forEach(lapangan => {
                            lapangan.kontrak.forEach(kontrak => {
                                if(kontrak['tahun'] == this.selectedTahun){
                                    this.lapanganLayout[lapangan['id']].addTo(this.map);
                                }
                            });
                        });
                    } else {
                        for (let key in this.lapanganLayout) {
                            this.lapanganLayout[key].addTo(this.map);
                        }
                    }
                },

                updateMapLapangan() {
                    for (let key in this.lapanganLayout) {
                        this.map.removeLayer(this.lapanganLayout[key]);
                    }
                    if (this.selectedLapangan && this.lapanganLayout[this.selectedLapangan]) {
                        this.lapanganLayout[this.selectedLapangan].addTo(this.map);
                    } else {
                        for (let key in this.lapanganLayout) {
                            this.lapanganLayout[key].addTo(this.map);
                        }
                    }
                },
    
                updateMap() {
                    // Remove all layers from the map
                    for (let key in this.wilayahLayers) {
                        this.map.removeLayer(this.wilayahLayers[key]);
                    }

                    for (let key in this.lapanganLayout) {
                        this.map.removeLayer(this.lapanganLayout[key]);
                    }

                    
                    // Add layers to the map
                    if (this.selectedWilayah && this.wilayahLayers[this.selectedWilayah]) {
                        this.wilayahs.forEach(data => {
                            if(data.nama_wilayah == this.selectedWilayah){
                                this.lapangans = data.lapangans
                                console.log(this.lapangans)
                            }
                        });
                        this.wilayahLayers[this.selectedWilayah].addTo(this.map);
                    } else {
                        for (let key in this.wilayahLayers) {
                            this.wilayahLayers[key].addTo(this.map);
                        }
                    }
                }
            }
        }
    </script>

</div>
