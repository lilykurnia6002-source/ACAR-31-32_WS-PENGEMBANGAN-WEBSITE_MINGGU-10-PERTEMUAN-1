<!DOCTYPE html>
<html>
<head>
    <title>Acara 31 - Manipulasi Gambar</title>
</head>
<body>
    <h2>Upload dan Manipulasi Gambar</h2>

    @if(session('success'))
        <p style="color: white;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Pilih Gambar:</label><br>
        <input type="file" name="photo"><br><br>
        <button type="submit">Upload & Process</button>
    </form>

    <!-- Menampilkan gambar yang telah di-upload -->
    <h3>Hasil Gambar Terakhir:</h3>
    <img src="{{ asset('uploads/image1.jpg') }}" alt="Hasil Upload" style="border: 1px solid #ccc;">
</body>
</html>