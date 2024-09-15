<!-- views/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Contact List</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #333333;
            text-align: left;
        }
        th {
            background-color: #1F1B24;
        }
        tr:hover {
            background-color: #1F1B24;
            transition: background-color 0.3s ease;
        }
        .btn {
            padding: 10px 20px;
            background-color: #BB86FC;
            color: #FFFFFF;
            border: none;
            cursor: pointer;
            margin: 10px 5px 0 0;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background-color: #3700B3;
        }
        .btn-delete {
            background-color: #CF6679;
        }
        .btn-delete:hover {
            background-color: #B00020;
        }
        .actions {
            display: flex;
        }
    </style>
</head>
<body>
    <h1>Contact List</h1>
    <button onclick="window.location.href='/create'" class="btn">Add New Contact</button>
    <table>
        <tr>
            <th>Name</th><th>Email</th><th>Phone</th><th>Actions</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?= htmlspecialchars($contact['name']) ?></td>
            <td><?= htmlspecialchars($contact['email']) ?></td>
            <td><?= htmlspecialchars($contact['phone']) ?></td>
            <td class="actions">
                <a href="/edit?id=<?= $contact['id'] ?>" class="btn">Edit</a>
                <a href="/delete?id=<?= $contact['id'] ?>" onclick="return confirm('Are you sure?');" class="btn btn-delete">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
