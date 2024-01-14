<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <STYle>

.button1:hover {
  background-color: black;
  color: white;
}
.btn-close{
  display: right;
}
H2 {
    margin: 5cm;
    text-align: center;
}

button {
    background-color: #252525;
  color: white;
  padding: 16px 25px;
  margin: 15px auto;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 8px;
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  transition: .4s ease-in-out;
}
.footer{
    color: blue;
}
@keyframes bubble-size {
  0%, 75% {
    width: var(--size, 4rem);
    height: var(--size, 4rem);
  }
  100% {
    width: 0rem;
    height: 0rem;
  }
}
@keyframes bubble-move{
  0% {
    bottom: -4rem;
  }
  100% {
    bottom: var(--distance, 10rem);
  }
}

.container {
  width: 100%;
  height: 100%;
  background: linear-gradient(#3f87a6 10%, #ebf8e1a2 10%),
    linear-gradient(to right, #ebf8e100 10%, #c73030 20% 20.2%, #ebf8e100 10.5%);
  background-size: 100% 25px, 100% 100%;
  background-repeat: repeat, no-repeat;
  /* Add your background pattern here */
}
h2 {
  font-size: 3rem;
}
    </STYle>
</head>
<body class="container">
  {{-- <div class="container"> --}}
    <h2>WELCOME TO XAVIE'S ENCRYPTION APPLICATION</h2>
    <div class="container mt-3">
        <button class="button1" type="button" data-bs-toggle="modal" data-bs-target="#myModal" style="width:auto">START</button>
    </div>
    <!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-fullscreen-sm-down">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Categories</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <ul class="nav nav-tabs">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Classical Encryption</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/caesar">Caesar cipher</a></li>
                  <li><a class="dropdown-item" href="/vigenere">Vigenere Cipher</a></li>
                  <li><a class="dropdown-item" href="/vernam">Vernam Cipher</a></li>
                  <li><a class="dropdown-item" href="/scytale">Scytale Cipher</a></li>
                  <li><a class="dropdown-item" href="/playfair">Playfair Cipher</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"  href="#">Modern Encryption</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/aes/AES">Advanced Encryption Standard (AES)</a></li>
                  {{-- <li><a class="dropdown-item" href="/rsa/RSA">Rivest Shamir & Adleman (RSA)</a></li> --}}
                  <li><a class="dropdown-item" href="/des/DES"> Data Encryption Standard (DES)</a></li>
                  {{-- <li><a class="dropdown-item" href="#">Secure Socket Layer (SSL)</a></li> --}}
                </ul>
              </li>
            </ul>
        </div>
  
        <!-- Modal footer -->
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div> --}}
  
      </div>
    </div>
  </div>  
  {{-- <DIV class="footer"></DIV> --}}
</body>
</html>