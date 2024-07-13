<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    public function run(): void
    {



        $jayapuraUtara2 = '
        {
            "coordinates": [
                [
                    140.70689820647306,
                    -2.513234507411781
                ],
                [
                    140.70679516507914,
                    -2.512941517809878
                ],
                [
                    140.7069219852575,
                    -2.512450562113372
                ],
                [
                    140.70712345473277,
                    -2.511958554478781
                ]
            ],
            "type": "LineString"
      }
        ';

        $jayapuraUtara3 = json_encode('
        {
        "coordinates": [
          [
            140.70706749098844,
            -2.511488910657164
          ],
          [
            140.70708987648658,
            -2.511119904678253
          ],
          [
            140.70723538222148,
            -2.5109633566556226
          ],
          [
            140.7076495139321,
            -2.510773262603479
          ],
          [
            140.70822034412566,
            -2.5107620805993918
          ],
          [
            140.7084553918532,
            -2.510773262603479
          ]
        ],
        "type": "LineString"
      }
        ');



        $data = collect([
            // Jayapura Utara
            ['lokasi' => 'Jayapura Utara 2', 'distrik_id' => '2', 'keterangan' => 'keterangan lokasi...', 'published_at' => now()],
            ['lokasi' => 'Jayapura Utara 3', 'distrik_id' => '2', 'keterangan' => 'keterangan lokasi...', 'published_at' => now()],

            // Jayapura Sekatan
            ['lokasi' => 'Jayapura Selatan 1', 'distrik_id' => '3', 'keterangan' => 'keterangan lokasi...', 'deleted_at' => now()],
            ['lokasi' => 'Jayapura Selatan 2', 'distrik_id' => '3', 'keterangan' => 'keterangan lokasi...', 'deleted_at' => now()],

            // Abepura
            ['lokasi' => 'Abepura 1', 'distrik_id' => '1', 'keterangan' => 'keterangan lokasi...'],
            ['lokasi' => 'Abepura 2', 'distrik_id' => '1', 'keterangan' => 'keterangan lokasi...'],
            ['lokasi' => 'Abepura 3', 'distrik_id' => '1', 'keterangan' => 'keterangan lokasi...'],

            // Heram
            ['lokasi' => 'Heram', 'distrik_id' => '5', 'keterangan' => 'keterangan lokasi...', 'published_at' => now()],

            // Lainnya
            ['lokasi' => 'Muara Tami', 'distrik_id' => '4', 'keterangan' => 'keterangan lokasi...', 'published_at' => now()],

            ['lokasi' => 'TPA', 'distrik_id' => '1', 'keterangan' => 'keterangan lokasi...', 'published_at' => now()],
        ]);

        $data->each(function ($item) {
            Lokasi::create($item);
        });
    }
}
