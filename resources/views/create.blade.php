<!DOCTYPE html>
<html>
<head>
    <title>新規投稿</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>新規投稿</h1>

        <form method="POST" action="{{ route('home.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">タスク:</label>
                <input type="text" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="content">タスク内容:</label>
                <textarea name="content" id="taskcontent"></textarea>
            </div>

            <div class="form-group">
                <label for="image">画像:</label>
                <input type="file" name="image" id="image">
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">投稿する</button>
        </form>
    </div>
</body>
</html>
