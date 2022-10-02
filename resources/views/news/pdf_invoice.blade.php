<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости в pdf</title>
    <style>
        body {
            font-family: "DejaVu Sans";
            font-size: 20px;
        }
    </style>
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Text</th>
        <th scope="col">Category_id</th>
        <th scope="col">isPrivate</th>
    </tr>
    </thead>
    <tbody>
    @foreach($news as $item)
        <tr>
            <th scope="row">{{ $item['id'] }}</th>
            <td>{{ $item['title'] }}</td>
            <td>{{ $item['text'] }}</td>
            <td>{{ $item['category_id'] }}</td>
            <td>{{ $item['isPrivate'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

