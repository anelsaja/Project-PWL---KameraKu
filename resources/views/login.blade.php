<!-- b4 -->
<!doctype html>
<html lang="en">
  <head>
    <title>Login - KameraKu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f3f4f6; /* Warna background abu muda yang sama dengan dashboard */
        height: 100vh; /* Agar konten berada di tengah layar penuh */
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .card-login {
        border: none;
        border-radius: 15px; /* Sudut melengkung modern */
        box-shadow: 0 10px 25px rgba(0,0,0,0.05); /* Bayangan lembut */
        width: 100%;
        max-width: 400px; /* Batasi lebar agar rapi */
        overflow: hidden;
      }

      .card-header {
        background-color: #fff;
        border-bottom: none;
        padding-top: 40px;
        text-align: center;
      }

      .logo-icon {
        font-size: 3.5rem;
        color: #3b82f6; /* Biru dashboard */
        margin-bottom: 10px;
        display: inline-block;
      }

      .form-control {
        border-radius: 8px;
        padding: 22px 15px; /* Input field lebih tinggi agar mudah diklik */
        background-color: #f9fafb;
        border: 1px solid #e5e7eb;
        font-size: 0.95rem;
      }

      .form-control:focus {
        background-color: #fff;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        border-color: #3b82f6;
      }

      .btn-primary {
        background-color: #3b82f6;
        border-color: #3b82f6;
        border-radius: 8px;
        padding: 12px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: 0.3s;
      }

      .btn-primary:hover {
        background-color: #2563eb;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
      }

      .form-label {
        font-weight: 600;
        font-size: 0.8rem;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
        display: block;
      }
    </style>
  </head>
  <body>
    <div class="card card-login">
      <div class="card-header">
        <div class="text-center">
            <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo KameraKu" style="width: 120px; height: auto; opacity: 0.8;">
        </div>
        <h4 class="font-weight-bold">Selamat Datang!</h4>
        <p class="text-muted small mb-0">Silahkan login terlebih dahulu.</p>
      </div>

      <div class="card-body p-4">
        
        <form action="/ceklogin" method="post">
           @csrf
           
           <div class="form-group mb-4">
             <label for="email" class="form-label">Email Anda</label>
             <div class="input-group">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
             </div>
           </div>

           <div class="form-group mb-4">
             <label for="password" class="form-label">Password</label>
             <input type="password" name="password" class="form-control" id="password" placeholder="Password anda" required>
           </div>

           <button type="submit" class="btn btn-primary btn-block">
             Masuk Sekarang
           </button>
        </form>
      </div>
          <footer class="bg-white border-top py-4 mt-5">
            <div class="container text-center">
              <p class="text-muted mb-0">&copy; 2025 KameraKu Rental. All Rights Reserved.</p>
            </div>
          </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>