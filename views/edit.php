<!-- views/edit.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: auto;
            background-color: #121212;
            color: #FFFFFF;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-top: 15px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            background-color: #1F1B24;
            color: #FFFFFF;
            border: 1px solid #333333;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #03DAC5;
            border: none;
            color: #000000;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #018786;
        }
    </style>
</head>
<body>
    <h1>Edit Contact</h1>
    <form action="/update" method="post">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($contact['name']) ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>" required>
        <label>Phone:</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($contact['phone']) ?>" required>
        <input type="submit" value="Update">
    </form>
</body>
</html>
