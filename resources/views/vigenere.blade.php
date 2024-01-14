<!DOCTYPE html>
<html>
<head>
    <title>Vigenère Cipher</title>
    @include('style')
</head>
    <div class="box">
        <h2>Vigenère Cipher Encryption</h2>
        <form method="POST" action="{{ route('vigenere.encrypt') }}">
            @csrf
          <div class="user-box">
            <input type="text" name="plaintext" id="plaintext" required>
            <label for="plaintext">Plaintext:</label>
          </div>
          <div class="user-box">
            <input type="text" name="key" id="key" required>
            <label for="key">Key:</label>
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
        <h2>Vigenère Cipher Decryption</h2>
        <form method="POST" action="{{ route('vigenere.decrypt') }}">
            @csrf
          <div class="user-box">
            <input type="text" name="ciphertext" id="ciphertext" value=" @if(isset($ciphertext))
            {{ $ciphertext }} 
            @endif" required>
            <label for="ciphertext">Ciphertext:</label>
          </div>
          <div class="user-box">
        <input type="text" name="key" id="key" required>
        <label for="key">Key:</label>
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