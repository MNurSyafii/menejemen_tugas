<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th colspan="5" style="text-align: center; font-size: 16px; font-weight: bold; padding: 8px;">
                Data Tugas
            </th>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$tugas->user->nama}}</td>

            <td>Email</td>
            <td>:</td>
            <td>{{$tugas->user->email}}</td>

            <td>Tugas</td>
            <td>:</td>
            <td>{{$tugas->tugas}}</td>

            <td>Tanggal Mulai</td>
            <td>:</td>
            <td>{{$tugas->tanggal_mulai}}</td>

            <td>Tanggal Selesai</td>
            <td>:</td>
            <td>{{$tugas->tanggal_selesai}}</td>
        </tr>
</table>
