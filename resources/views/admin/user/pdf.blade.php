<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th colspan="5" style="text-align: center; font-size: 16px; font-weight: bold; padding: 8px;">
                Data User
            </th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 5px;">No</th>
            <th style="border: 1px solid black; padding: 5px;">Nama</th>
            <th style="border: 1px solid black; padding: 5px;">Email</th>
            <th style="border: 1px solid black; padding: 5px;">Jabatan</th>
            <th style="border: 1px solid black; padding: 5px;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $data)
            <tr>
                <td style="border: 1px solid black; padding: 5px;">{{ $loop->iteration }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $data->nama }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $data->email }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $data->jabatan }}</td>
                <td style="border: 1px solid black; padding: 5px;">
                    {{ $data->is_tugas ? 'Sudah dikerjakan' : 'Belum dikerjakan' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
