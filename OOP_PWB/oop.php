<?php

class Book {
    private $code_book;
    private $name;
    private $qty;

    public function __construct($code_book, $name, $qty) {
        if ($this->isValidCodeBook($code_book)) {
            $this->setCodeBook($code_book);
        } else {
            echo "Error: Format code_book harus BB00 (2 huruf kapital + 2 angka 0-9)\n";
        }

        $this->name = $name;

        if ($this->isValidQty($qty)) {
            $this->setQty($qty);
        } else {
            echo "Error: qty harus berupa bilangan bulat positif lebih dari 0\n";
        }
    }

    // Setter code_book (private)
    private function setCodeBook($code_book) {
        $this->code_book = $code_book;
    }

    // Getter code_book
    public function getCodeBook() {
        return $this->code_book;
    }

    // Setter qty (private)
    private function setQty($qty) {
        $this->qty = $qty;
    }

    // Getter qty
    public function getQty() {
        return $this->qty;
    }

    // Getter name (tidak perlu validasi)
    public function getName() {
        return $this->name;
    }

    // Validasi code_book
    private function isValidCodeBook($code_book) {
        return preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book);
    }

    // Validasi qty
    private function isValidQty($qty) {
        return is_int($qty) && $qty > 0;
    }
}

// Input user dengan loop sampai benar
echo "\n--- INPUT DARI USER ---\n";

do {
    echo "Masukkan kode buku (format BB00): ";
    $userCode = trim(fgets(STDIN));
    if (!preg_match('/^[A-Z]{2}[0-9]{2}$/', $userCode)) {
        echo "Error: Format code_book harus BB00 (2 huruf kapital + 2 angka)\n";
        $validCode = false;
    } else {
        $validCode = true;
    }
} while (!$validCode);

echo "Masukkan nama buku: ";
$userName = trim(fgets(STDIN));

do {
    echo "Masukkan qty (angka bulat positif): ";
    $userQtyInput = trim(fgets(STDIN));
    if (is_numeric($userQtyInput) && (int)$userQtyInput == $userQtyInput && (int)$userQtyInput > 0) {
        $userQty = (int)$userQtyInput;
        $validQty = true;
    } else {
        echo "Error: qty harus berupa bilangan bulat positif lebih dari 0\n";
        $validQty = false;
    }
} while (!$validQty);

// Buat objek buku dari input user
$userBook = new Book($userCode, $userName, $userQty);

// Tampilkan hasil input user
echo "\n--- DATA DARI USER ---\n";
echo "Kode: " . $userBook->getCodeBook() . "\n";
echo "Nama: " . $userBook->getName() . "\n";
echo "Qty : " . $userBook->getQty() . "\n";
