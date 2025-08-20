<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th colspan="5" style="text-align: center; font-size: 16px; font-weight: bold; padding: 8px;">
                Data Tugas
            </th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 5px;">No</th>
            <th style="border: 1px solid black; padding: 5px;">Nama</th>
            <th style="border: 1px solid black; padding: 5px;">Email</th>
            <th style="border: 1px solid black; padding: 5px;">Tugas</th>
            <th style="border: 1px solid black; padding: 5px;">Tanggal Mulai</th>
            <th style="border: 1px solid black; padding: 5px;">Tanggal Selesai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tugas as $data)
            <tr>
                <td style="border: 1px solid black; padding: 5px;">{{ $loop->iteration }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $data->user->nama }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $data->user->email }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $data->tugas }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $data->tanggal_mulai }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $data->tanggal_selesai}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
