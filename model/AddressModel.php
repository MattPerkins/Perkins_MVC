<?php

class AddressModel
{
    private mysqli $conn;

    public function __construct()
    {
        $host = "localhost";
        $user = "ecpi_user";
        $pass = "ecpi";
        $dbname = "sdc310_midterm";

        $this->conn = new mysqli($host, $user, $pass, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAllAddresses(): mysqli_result
    {
        return $this->conn->query("SELECT * FROM addresses ORDER BY AddressNo");
    }

    public function getAddressById(int $id): ?array
    {
        $stmt = $this->conn->prepare("SELECT * FROM addresses WHERE AddressNo = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();

        return $row ?: null;
    }

    public function addAddress(
        string $first,
        string $last,
        string $street,
        string $city,
        string $state,
        string $zip
    ): void {
        $stmt = $this->conn->prepare(
            "INSERT INTO addresses (First, Last, Street, City, State, Zip)
             VALUES (?, ?, ?, ?, ?, ?)"
        );

        $stmt->bind_param("ssssss", $first, $last, $street, $city, $state, $zip);
        $stmt->execute();
        $stmt->close();
    }

    public function updateAddress(
        int $id,
        string $first,
        string $last,
        string $street,
        string $city,
        string $state,
        string $zip
    ): void {
        $stmt = $this->conn->prepare(
            "UPDATE addresses
             SET First = ?, Last = ?, Street = ?, City = ?, State = ?, Zip = ?
             WHERE AddressNo = ?"
        );

        $stmt->bind_param("ssssssi", $first, $last, $street, $city, $state, $zip, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteAddress(int $id): void
    {
        $stmt = $this->conn->prepare("DELETE FROM addresses WHERE AddressNo = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
