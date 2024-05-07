<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 10px;
        }

        .edit-link, .delete-link {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Product</h1>
    <div>
        <a href="{{ route('product.create') }}" style="display: block; text-align: center; margin-bottom: 20px; font-size: 18px;">Add a product!</a>
    </div>
        <div>
            @if(session()->has('success'))
            <div class="success-message">
                {{session('success')}}
            </div>
            @endif
        </div>
        <table>
            <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->qty}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <a class="edit-link" href="{{route('product.edit', ['product' => $product])}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>