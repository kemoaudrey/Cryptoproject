<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* ecrypt form style */
        .box {
  position: absolute;
  top: 50%;
  left: 20%;
  width: 500px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(24, 20, 20, 0.987);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.box .user-box {
  position: relative;
}

.box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}

.box .user-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}
h2{
    color: #fff; 
}

.box .user-box input:focus ~ label,
.box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #bdb8b8;
  font-size: 12px;
}

.box form button {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: black;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.box button:hover {
  background: #03f40f;
  color:black;
  border-radius: 5px;
  box-shadow: 0 0 5px #03f40f,
              0 0 25px #03f40f,
              0 0 50px #03f40f,
              0 0 100px #03f40f;
}

.box button span {
  position: absolute;
  display: block;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }

  50%,100% {
    left: 100%;
  }
}

.box button span:nth-child(1) {
  bottom: 2px;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03f40f);
  animation: btn-anim1 2s linear infinite;
}
/* decrypt form style */
.form-container {
  position: absolute;
  top: 50%;
  right: 0%;
  width: 500px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(24, 20, 20, 0.987);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}
.form-container .user-box {
  position: relative;
}

.form-container .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}

.form-container .user-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}
h2{
    color: #fff; 
}

.form-container .user-box input:focus ~ label,
.form-container .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #bdb8b8;
  font-size: 12px;
}

.form-container form button {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: black;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.form-container button:hover {
  background: #f50808;
  color:black;
  border-radius: 5px;
  box-shadow: 0 0 5px #e70606,
              0 0 25px #e00b0b,
              0 0 50px #f40303,
              0 0 100px #f40303;
}

.form-container button span {
  position: absolute;
  display: block;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }

  50%,100% {
    left: 100%;
  }
}

.form-container button span:nth-child(1) {
  bottom: 2px;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #f10707);
  animation: btn-anim1 2s linear infinite;
}
/* button go back style */
.cta {
 position: relative;
 margin: auto;
 padding: 12px 18px;
 transition: all 0.2s ease;
 border: none;
 background: none;
}

.cta:before {
 content: "";
 position: absolute;
 top: 0;
 left: 0;
 display: block;
 border-radius: 50px;
 background: #b1dae7;
 width: 45px;
 height: 45px;
 transition: all 0.3s ease;
}

.cta span {
 position: relative;
 font-family: "Ubuntu", sans-serif;
 font-size: 18px;
 font-weight: 700;
 letter-spacing: 0.05em;
 color: #234567;
}

.cta svg {
 position: relative;
 top: 0;
 margin-right: 10px;
 fill: none;
 stroke-linecap: round;
 stroke-linejoin: round;
 stroke: #234567;
 stroke-width: 2;
 transform: translateX(-5px);
 transition: all 0.3s ease;
}

.cta:hover:before {
 width: 100%;
 background: #b1dae7;
}

.cta:hover svg {
 transform: translateX(0);
}

.cta:active {
 transform: scale(0.95);
}
    </style>
</head>
<body>

    <div class="box">
        <h2>Encryption</h2>
       <form method="POST" action="{{ route('des.encrypt') }}">
            @csrf
          <div class="user-box">
            <input type="text" class="form-control" name="plaintext" id="plaintext" rows="4" cols="50" required><br><br>
            {{-- <input type="text" class="form-control" name="text" id="text" required><br><br> --}}
            <label for="plaintext" class="form-label">Enter the plaintext to encrypt:</label>
          </div>
          <div class="user-box">
            <input type="text" class="form-control" name="key" id="key" required><br><br>
            <label for="key" class="form-label">Key:</label>
          </div>
          <br>
          @if(isset($ciphertext))
          <h2>Encrypted Text: {{ $ciphertext }}</h2>
      @endif
          <center>
          <button type="submit">
            Encrypt
             <span></span>
          </button></center>
        </form>
      </div>
      <div class="form-container">
        <h2>Decryption</h2>
        <form method="POST" action="{{ route('des.decrypt') }}">
            @csrf
          <div class="user-box">
            <input type="text" name="ciphertext" id="ciphertext" rows="4" cols="50" value=" @if(isset($ciphertext))
            {{ $ciphertext }}
        @endif" required><br>
            {{-- <input type="text" name="text" id="text" value="{{ $cipher }}" required><br><br> --}}
            <label for="ciphertext" class="form-label">Enter the ciphertext to decrypt:</label>
          </div>
          <div class="user-box">
            <input type="text" name="key" id="key" required><br><br>
            <label for="key" class="form-label">Key:</label>
          </div>
      @if(isset($plaintext))
      <h2>Decrypted Text: {{ $plaintext }}</h2>
      @endif
          <center>
          <button type="submit">
            Decrypt
             <span></span>
          </button></center>
        </form>
</div>
<a href="/">
    <button class="cta">
      <span>Go Back</span>
      <svg viewBox="0 0 13 10" height="10px" width="15px">
        <path d="M1,5 L11,5"></path>
       <polyline points="8 1 12 5 8 9"></polyline>
       </svg>
     </button>
   </a>
   @include('tipstyle')
   <div class="item-hints">
    <div class="hint" data-position="4">
      <span class="hint-radius"></span>
      <span class="hint-dot">Tip</span>
      <div class="hint-content do--split-children">
        <p>DES, is a symmetric block cipher algorithm used for secure data encryption. It operates on fixed-size blocks of data and employs a Feistel network structure. DES involves multiple rounds of substitutions, permutations, using a 56-bit key.</p>

        </div>
    </div>
  </div>
</body>
</html>



