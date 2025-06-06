<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Kategori</title>
    <style>
        body { font-family: sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2>Daftar Kategori</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
