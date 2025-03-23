let n = (prompt("Masukkan angka yang diinginkan untuk deret Fibonacci:")); 
let a = 0;
let b = 1; 

console.log("SELAMAT DATANG DI PROGRAM DERET FIBONACCI\n");
console.log("Masukkan angka yang diinginkan untuk deret Fibonacci: " + n);
console.log("\nBerikut adalah deret Fibonacci:");

for (let m = 0; m < n; m++) {
    console.log(a + " ");

    let c = a + b;
    a = b; 
    b = c; 
}
console.log("\nSELAMAT DERET FIBONACCI TELAH DITEMUKAN\n");