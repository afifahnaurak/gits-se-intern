# Internship - Problem Solving Test

**Soal 3 - Balanced Brackets**

1. **Ukuran Kompleksitas Kodingan**

   - Waktu: O(n)
   - Ruang: O(n)

   Penjelasan:
   - Kompleksitas waktu (O(n)): Kodingan ini memerlukan waktu O(n) untuk mengecek keseimbangan tumpukan bracket pada input. Loop `for ($i = 0; $i < strlen($input); $i++)` digunakan untuk mengiterasi melalui setiap karakter dalam input brackets, sehingga kompleksitas waktu menjadi O(n), dengan "n" adalah jumlah karakter dalam input.
   - Kompleksitas ruang (O(n)): Kodingan ini menggunakan stack untuk menyimpan karakter bukaan bracket dari input. Dalam kasus terburuk, jika semua karakter dalam input adalah bukaan bracket, stack akan menyimpan seluruh "n" karakter dalam input, sehingga kompleksitas ruang menjadi O(n).

2. **Detail Kompleksitas Codingan "Check Balanced Brackets"**

   - Kompleksitas waktu: O(n)
     - Alasan: Kodingan menggunakan loop `for` untuk mengiterasi melalui setiap karakter dalam input brackets. Operasi dalam loop memiliki kompleksitas waktu konstan, yaitu O(1). Karena loop dieksekusi sebanyak karakter dalam input brackets (n), maka kompleksitas waktu secara keseluruhan adalah O(n).

   - Kompleksitas ruang: O(n)
     - Alasan: Kodingan ini menggunakan stack untuk menyimpan karakter bukaan bracket dari input. Dalam kasus terburuk, ketika semua karakter dalam input adalah bukaan bracket, stack akan menyimpan seluruh "n" karakter dalam input. Sehingga kompleksitas ruangnya adalah O(n).

   - Penjelasan Singkat:
     Kodingan "Check Balanced Brackets" menggunakan pendekatan stack untuk memeriksa keseimbangan tumpukan bracket dalam input. Iterasi dilakukan sebanyak karakter dalam input (n), dengan setiap operasi dalam loop berjalan dalam waktu konstan O(1). Penggunaan stack menyebabkan kompleksitas ruang menjadi O(n), karena dalam kasus terburuk, stack akan menyimpan seluruh "n" karakter dari input. Jadi, secara keseluruhan, kodingan ini memiliki kompleksitas waktu O(n) dan kompleksitas ruang O(n).

   - Contoh:
     Misalkan kita memiliki input brackets sebagai berikut: "([]{})". Dalam hal ini, ada 6 karakter dalam input (n = 6).
     - Iterasi 1: Stack: "[" (karakter pertama dimasukkan ke stack)
     - Iterasi 2: Stack: "[(]" (karakter kedua dimasukkan ke stack)
     - Iterasi 3: Stack: "[({]" (karakter ketiga dimasukkan ke stack)
     - Iterasi 4: Stack: "[({" (karakter keempat adalah karakter penutup, stack berisi karakter bukaan, sehingga karakter penutup tidak berpasangan)
     - Sehingga output adalah "NO" karena tumpukan tidak seimbang.
