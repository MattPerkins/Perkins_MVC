<?php

require_once __DIR__ . "/../model/AddressModel.php";

class AddressController
{
    private AddressModel $model;

    public function __construct()
    {
        $this->model = new AddressModel();
    }

    public function handleRequest(): void
    {
        $action = $_GET["action"] ?? "list";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($action === "add") {
                $this->add();
                return;
            }

            if ($action === "update") {
                $this->update();
                return;
            }
        }

        if ($action === "edit") {
            $this->edit();
            return;
        }

        if ($action === "delete") {
            $this->delete();
            return;
        }

        $this->showList();
    }

    private function showList(): void
    {
        $message = "";

        if (isset($_GET["msg"])) {
            if ($_GET["msg"] === "added") {
                $message = "Record added successfully.";
            } elseif ($_GET["msg"] === "updated") {
                $message = "Record updated successfully.";
            } elseif ($_GET["msg"] === "deleted") {
                $message = "Record deleted successfully.";
            }
        }

        $addresses = $this->model->getAllAddresses();

        require __DIR__ . "/../view/addresses.php";
    }

    private function add(): void
    {
        $first = trim($_POST["first"] ?? "");
        $last = trim($_POST["last"] ?? "");
        $street = trim($_POST["street"] ?? "");
        $city = trim($_POST["city"] ?? "");
        $state = strtoupper(trim($_POST["state"] ?? ""));
        $zip = trim($_POST["zip"] ?? "");

        $this->model->addAddress($first, $last, $street, $city, $state, $zip);

        header("Location: index.php?msg=added");
        exit;
    }

    private function edit(): void
    {
        $id = (int) ($_GET["id"] ?? 0);

        if ($id <= 0) {
            header("Location: index.php");
            exit;
        }

        $address = $this->model->getAddressById($id);

        if (!$address) {
            die("Record not found.");
        }

        require __DIR__ . "/../view/edit.php";
    }

    private function update(): void
    {
        $id = (int) ($_POST["id"] ?? 0);

        $first = trim($_POST["first"] ?? "");
        $last = trim($_POST["last"] ?? "");
        $street = trim($_POST["street"] ?? "");
        $city = trim($_POST["city"] ?? "");
        $state = strtoupper(trim($_POST["state"] ?? ""));
        $zip = trim($_POST["zip"] ?? "");

        $this->model->updateAddress(
            $id,
            $first,
            $last,
            $street,
            $city,
            $state,
            $zip
        );

        header("Location: index.php?msg=updated");
        exit;
    }

    private function delete(): void
    {
        $id = (int) ($_GET["id"] ?? 0);

        if ($id > 0) {
            $this->model->deleteAddress($id);
        }

        header("Location: index.php?msg=deleted");
        exit;
    }
}
?>
