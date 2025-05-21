<?php
require_once "koneksi.php";

class Menu {
    public function get_menu($id = 0) {
        global $koneksi;
        $query = "SELECT * FROM menu";
        if ($id != 0) {
            $query .= " WHERE id = $id LIMIT 1";
        }
        $data = [];
        $result = $koneksi->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $row->price = (float)$row->price;
            $data[] = $row;
        }
        $response = [
            'status' => 1,
            'message' => 'Menu berhasil diambil.',
            'data' => $data
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function insert_menu() {
        global $koneksi;
        $arr = ['name' => '', 'price' => '', 'chef' => '', 'category' => '', 'description' => '', 'status' => ''];
        $hitung = count(array_intersect_key($_POST, $arr));
        if ($hitung == count($arr)) {
            $name = mysqli_real_escape_string($koneksi, $_POST['name']);
            $price = (float) $_POST['price'];
            $chef = mysqli_real_escape_string($koneksi, $_POST['chef']);
            $category = mysqli_real_escape_string($koneksi, $_POST['category']);
            $description = mysqli_real_escape_string($koneksi, $_POST['description']);
            $status = mysqli_real_escape_string($koneksi, $_POST['status']);

            $result = mysqli_query($koneksi, "INSERT INTO menu SET 
                name='$name',
                price='$price',
                chef='$chef',
                category='$category',
                description='$description',
                status='$status'
            ");
            $response = [
                'status' => $result ? 1 : 0,
                'message' => $result ? 'Menu berhasil ditambahkan.' : 'Gagal menambahkan menu.'
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'Parameter tidak lengkap.'
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function update_menu($id) {
        global $koneksi;
        $arr = ['name' => '', 'price' => '', 'chef' => '', 'category' => '', 'description' => '', 'status' => ''];
        $hitung = count(array_intersect_key($_POST, $arr));
        if ($hitung == count($arr)) {
            $name = mysqli_real_escape_string($koneksi, $_POST['name']);
            $price = (float) $_POST['price'];
            $chef = mysqli_real_escape_string($koneksi, $_POST['chef']);
            $category = mysqli_real_escape_string($koneksi, $_POST['category']);
            $description = mysqli_real_escape_string($koneksi, $_POST['description']);
            $status = mysqli_real_escape_string($koneksi, $_POST['status']);

            $result = mysqli_query($koneksi, "UPDATE menu SET 
                name='$name',
                price='$price',
                chef='$chef',
                category='$category',
                description='$description',
                status='$status'
                WHERE id='$id'
            ");
            $response = [
                'status' => $result ? 1 : 0,
                'message' => $result ? 'Menu berhasil diperbarui.' : 'Gagal memperbarui menu.'
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'Parameter tidak lengkap.'
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function delete_menu($id) {
        global $koneksi;
        $result = mysqli_query($koneksi, "DELETE FROM menu WHERE id=$id");
        $response = [
            'status' => $result ? 1 : 0,
            'message' => $result ? 'Menu berhasil dihapus.' : 'Gagal menghapus menu.'
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>