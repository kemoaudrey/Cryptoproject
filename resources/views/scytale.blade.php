<!DOCTYPE html>
<html>
<head>
    <title>Scytale Cipher</title>

    @include('style')
    </head>
        <div class="box">
            <h2>Scytale Cipher Encryption</h2>
            <form method="POST" action="{{ route('scytale.encrypt') }}">
                @csrf
              <div class="user-box">
                <input type="text" name="plaintext" id="plaintext" required>
                <label for="plaintext">Plaintext:</label>
              </div>
              <div class="user-box">
                <input type="number" name="diameter" id="diameter" required>
                <label for="diameter">Diameter:</label>
              </div>
              <br>
              @if(isset($ciphertext))
              <h2>Cipher Result: {{ $ciphertext }} </h2>
              @endif
              <center>
              <button type="submit">
                Encrypt
                 <span></span>
              </button></center>
            </form>
          </div>
          <div class="form-container">
            <h2>Scytale Cipher Decryption</h2>
            <form method="POST" action="{{ route('scytale.decrypt') }}">
                @csrf
              <div class="user-box">
                <input type="text" name="ciphertext" id="ciphertext" value=" @if(isset($ciphertext))
                 {{ $ciphertext }}
                @endif" required>
                <label for="ciphertext">Ciphertext:</label>
              </div>
              <div class="user-box">
                <input type="number" name="diameter" id="diameter" required>
                <label for="diameter">Diameter:</label>
              </div>
              @if(isset($plaintext))
              <h2>Decrypted Plaintext: {{ $plaintext }}</h2>
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
    </body>
</html>
