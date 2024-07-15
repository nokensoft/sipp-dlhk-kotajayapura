<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Preview</title>
</head>

<style>
  #records {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #records td, #records th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #records tr:nth-child(even){background-color: #f2f2f2;}

  #records tr:hover {background-color: #ddd;}

  #records th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }

  .img{
    border-radius: 5%;
    width : 80px;
  }
  h1{
    text-align : center;
  }
</style>
<body>
    <h1 >Data Pegawai</h1>
    <table id="records">
      <thead>
      <tr>
          <th>Foto</th>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>No Hp</th>
          <th>Bidang</th>
          <th>Lokasi</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Pangkat Golongan</th>
          <th>Suku</th>
          <th>Distrik</th>
          <th>Kelurahan</th>
          <th>Jabatan</th>
          <th>Deskripsi Tugas</th>
          <th>Gelar Depan</th>
          <th>Gelar Belakang</th>
          <th>Gelar Akademis</th>
          <th>Jenjang Pendidikan</th>
          <th>Status Perkawinan</th>
          <th>Keterangan</th>
      </tr>
      </thead>
      <tbody>
          @foreach($data as $record)
              <tr>
                  <td>

                    <img class="img" src="{{ file_exists('storage/'.$record->gambar) ? 'storage/'.$record->gambar : 'assets/img/avatars/man.png'}}" alt="" srcset="">
                  </td>
                  <td>
                    {{$record->nama_depan}} {{$record->nama_tengah}} {{$record->nama_belakang}}
                  </td>
                  <td>
                      <span class="capitalize">{{$record->email}}</span>
                  </td>
                  <td>{{$record->no_hp}}</td>
                  <td>{{$record->bidang?->bidang}}</td>
                  <td>{{$record->lokasi?->lokasi}}</td>
                  <td>{{$record->jenisKelamin?->jenis_kelamin}}</td>
                  <td>{{$record->agama?->agama}}</td>
                  <td>{{$record->pangkatGolongan?->pangkat_golongan}}</td>
                  <td>{{$record->suku?->suku}}</td>
                  <td>{{$record->distrik?->distrik}}</td>
                  <td>{{$record->kelurahan?->kelurahan}}</td>
                  <td>{{$record->jabatan?->jabatan}}</td>
                  <td>{{$record->deskripsiTugas?->deskripsi_tugas}}</td>
                  <td>{{$record->gelarDepan?->gelar_depan}}</td>
                  <td>{{$record->gelarBelakang?->gelar_belakang}}</td>
                  <td>{{$record->gelarAkademis?->gelar_akademis}}</td>
                  <td>{{$record->jenjangPendidikan?->jenjang_pendidikan}}</td>
                  <td>{{$record->statusPerkawinan?->status_perkawinan}}</td>
                  <td>{{$record->catatan}}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</body>
</html>
