<!DOCTYPE html>
<html>
<head>
    <title>Laporan Visitor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            margin-bottom: 5px;
        }
        .info {
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 6px;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>LAPORAN DATA VISITOR</h2>

    <div class="info">
        <p>Filter: {{ $filter }}</p>
        <p>Total Visitor: {{ $total }}</p>
        <p>Tanggal Cetak: {{ date('d-m-Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>IP Address</th>
                <th>Browser</th>
                <th>Halaman</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitor as $v)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $v->ip_address }}</td>
                <td>{{ $v->browser_short }}</td>
                <td>{{ $v->url_short }}</td>
                <td>{{ date('d-m-Y', strtotime($v->created_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>