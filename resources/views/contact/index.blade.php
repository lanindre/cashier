@extends('template.layout')

@section('content')
<head>
    <style>
        /* resources/css/contact.css */

/* resources/css/contact.css */

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 0 20px;
}

.container h1 {
    text-align: center;
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.col-md-6 {
    flex: 0 0 calc(50% - 10px);
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.label {
    display: block;
    margin-bottom: 5px;
}

.input-text {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    height: 150px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

.btn:hover {
    background-color: #0056b3;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}

.map-container {
    display: flex;
    align-items: center;
}

.map {
    flex: 1;
}

@media (max-width: 768px) {
    .col-md-6 {
        flex: 0 0 100%;
    }
}

    </style>
</head>
<body>
    

    <div class="container">
        <h1>Contact Us</h1>
    </br>
        <div class="row">
            <div class="col-md-6">
                <!-- Informasi kontak -->
                <h2>Alamat:</h2>
                <p>Jalan Contoh No. 123</p>
                <p>Kota Contoh</p>
                <p>Negara Contoh</p>

                <!-- Formulir pertanyaan -->
                <h2>Pertanyaan kepada Developer</h2>
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan:</label>
                        <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
            <div class="col-md-6">
                <!-- Foto kantor -->
                <img src="{{ asset('images/samples/kotak/12.jpg') }}" alt="Kantor" class="img-fluid">
                <!-- Peta Google Maps (ganti dengan kode peta sesuai lokasi kantor) -->
                <iframe src="https://www.google.com/maps?sca_esv=62d66252683bd9aa&rlz=1C1CHBF_enID1013ID1013&output=search&q=smkn+1+cianjur&source=lnms&entry=mc&ved=1t:200715&ictx=111" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</body>
@endsection
