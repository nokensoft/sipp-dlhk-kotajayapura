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
                <x-admin.select label="Lapangan" id="lapangan-id" optionName="name" name="lapangan">
                    <option>Semua</option>
                    @foreach($lapangans as $lapangan)
                        <option value="{{$lapangan['nama_lapangan']}}">{{$lapangan->nama_lapangan}}</option>
                    @endforeach
                </x-admin.select>
            </div>

            <div class="w-1/4">
                <x-admin.select label="Tahun Kontrak" id="tahun_kontrak" optionName="name" name="tahun_kontrak">
                    @foreach($tahuns as $tahun)
                        <option value="{{$tahun}}">{{$tahun}}</option>
                    @endforeach
                </x-admin.select>
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
                bidangs: @entangle('bidangs'),
                map: null,
                colors: ['#ff0000', '#eed959', '#00ff00', '#ffff00', '#0000ff'],
                selectedWilayah: '',
                wilayahLayers: {},
                bidangLayout: {},
    
                init() {
                    this.map = L.map('map').setView({lat: -2.53371, lng: 140.71813}, 12);
                    const getUrl = window.location;
                    const baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
    
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
                    for (let i = 0; i < this.bidangs.length; i++) {
                        this.bidangLayout[this.bidangs[i]['bidang']] = L.layerGroup();
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
                                            if (lapangan['lokasi'] && lapangan['bidang']) {
                                                let latitude = lapangan['lokasi']['latitude'];
                                                let longitude = lapangan['lokasi']['longitude'];
                                                let bidang = lapangan['bidang']['bidang'];
                                                let nama = lapangan['nama_depan'] + ' ' + lapangan['nama_tengah'] + ' ' + lapangan['nama_belakang'];
                                                let iconUrl = baseUrl + lapangan['bidang']['icon'];
                                                let foto = baseUrl + lapangan['gambar'];
                                                L.marker([latitude, longitude], {
                                                    icon: L.icon({ iconUrl, iconSize: [30, 30], iconAnchor: [12, 41], popupAnchor: [1, -34] })
                                                })
                                                .bindPopup(`
                                                    <b>${bidang}</b><br><img src="${foto}" alt="Profile Picture" style="width:100px;height:auto;"><br>Nama: ${nama}
                                                `).addTo(this.bidangLayout[bidang]);
                                            }
                                        });
                                    });
                                    layer.on('remove', () => {
                                        lapangans.forEach((lapangan) => {
                                            if (lapangan['lokasi'] && lapangan['bidang']) {
                                                L.marker([latitude, longitude], {
                                                    icon: L.icon({ iconUrl, iconSize: [30, 30], iconAnchor: [12, 41], popupAnchor: [1, -34] })
                                                })
                                                .bindPopup(`
                                                    <b>${bidang}</b><br><img src="${foto}" alt="Profile Picture" style="width:100px;height:auto;"><br>Nama: ${nama}
                                                `).removeFrom(this.bidangLayout[bidang]);
                                            }
                                        });
                                    });
                                }
                            });
                        } catch (e) {
                            console.error(`Invalid GeoJSON for wilayah: ${this.wilayahs[i]['nama_wilayah']}`, e);
                        }
                    }
    
                    this.updateMap();
                },
    
                updateMap() {
                    // Remove all layers from the map
                    for (let key in this.wilayahLayers) {
                        this.map.removeLayer(this.wilayahLayers[key]);
                    }
    
                    // Add layers to the map
                    if (this.selectedWilayah && this.wilayahLayers[this.selectedWilayah]) {
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
