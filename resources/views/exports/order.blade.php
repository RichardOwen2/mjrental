<table>
    <thead>
        <tr>
            <th colspan="6">Order Report</th>
        </tr>
        <tr>
            <th>{{ $date }}</th>
        </tr>
        <tr></tr>
        <tr>
            <th>No</th>
            <th>Created at</th>
            <th>Produk</th>
            <th>Tipe</th>
            <th>Plat</th>
            <th>Date In</th>
            <th>Date Out</th>
            <th>Status</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->created_at }}</td>
            <td>{{ $data->product->name }}</td>
            <td>{{ $data->product->type->name }}</td>
            <td>{{ $data->product->number }}</td>
            <td>{{ $data->date_in ? $data->date_in : '-' }}</td>
            <td>{{ $data->date_out ? $data->date_out : '-' }}</td>
            <td>{{ $data->status == 'Open' ? 'Rented' : 'Finished' }}</td>
            <td>{{ $data->description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
