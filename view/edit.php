<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Address</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
<div class="container small">
    <h1>Edit Address</h1>

    <form method="post" action="index.php?action=update">
        <input type="hidden" name="id" value="<?= $address["AddressNo"] ?>">

        <label>First Name</label>
        <input type="text"
               name="first"
               maxlength="25"
               value="<?= htmlspecialchars($address["First"]) ?>"
               required>

        <label>Last Name</label>
        <input type="text"
               name="last"
               maxlength="30"
               value="<?= htmlspecialchars($address["Last"]) ?>"
               required>

        <label>Street Address</label>
        <input type="text"
               name="street"
               maxlength="100"
               value="<?= htmlspecialchars($address["Street"]) ?>"
               required>

        <label>City</label>
        <input type="text"
               name="city"
               maxlength="25"
               value="<?= htmlspecialchars($address["City"]) ?>"
               required>

        <label>State</label>
        <input type="text"
               name="state"
               maxlength="2"
               value="<?= htmlspecialchars($address["State"]) ?>"
               required>

        <label>Zip Code</label>
        <input type="text"
               name="zip"
               maxlength="10"
               value="<?= htmlspecialchars($address["Zip"]) ?>"
               required>

        <button type="submit">Save Changes</button>
        <a class="cancel" href="index.php">Cancel</a>
    </form>
</div>
</body>
</html>
