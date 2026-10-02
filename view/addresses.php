<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matthew Perkins MVC Address Book</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
<div class="container">
    <h1>Address Book</h1>

    <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <table>
        <tr>
            <th>Address #</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Street Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php while ($row = $addresses->fetch_assoc()): ?>
            <tr>
                <td><?= $row["AddressNo"] ?></td>
                <td><?= htmlspecialchars($row["First"]) ?></td>
                <td><?= htmlspecialchars($row["Last"]) ?></td>
                <td><?= htmlspecialchars($row["Street"]) ?></td>
                <td><?= htmlspecialchars($row["City"]) ?></td>
                <td><?= htmlspecialchars($row["State"]) ?></td>
                <td><?= htmlspecialchars($row["Zip"]) ?></td>
                <td>
                    <a class="button edit"
                       href="index.php?action=edit&id=<?= $row["AddressNo"] ?>">
                        Edit
                    </a>
                </td>
                <td>
                    <a class="button delete"
                       href="index.php?action=delete&id=<?= $row["AddressNo"] ?>"
                       onclick="return confirm('Delete this record?');">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Add New Address</h2>

    <form method="post" action="index.php?action=add">
        <label>First Name</label>
        <input type="text" name="first" maxlength="25" required>

        <label>Last Name</label>
        <input type="text" name="last" maxlength="30" required>

        <label>Street Address</label>
        <input type="text" name="street" maxlength="100" required>

        <label>City</label>
        <input type="text" name="city" maxlength="25" required>

        <label>State</label>
        <input type="text" name="state" maxlength="2" required>

        <label>Zip Code</label>
        <input type="text" name="zip" maxlength="10" required>

        <button type="submit">Add Address</button>
    </form>
</div>
</body>
</html>
