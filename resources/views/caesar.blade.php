<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
@include('style')
</head>
<body>

    <div class="box">
        <h2>Encryption</h2>
        <form action="{{ route('caesar.encrypt') }}" method="POST">
            @csrf
          <div class="user-box">
            <input type="text" class="form-control" name="text" id="text" required><br><br>
            <label for="text" class="form-label">Text:</label>
          </div>
          <div class="user-box">
            <input type="number" class="form-control" name="shift" id="shift" required><br><br>
            <label for="shift" class="form-label">Shift:</label>
          </div>
          <br>
          @if(isset($cipher))
          <h2>Encrypted Text: {{ $cipher }} </h2>
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
        <form action="{{ route('caesar.decrypt') }}" method="POST">
            @csrf
          <div class="user-box">
            <input type="text" name="text" id="text" value="{{ $cipher }}" required><br><br>
            <label for="text" class="form-label">Text:</label>
          </div>
          <div class="user-box">
            <input type="number" name="shift" id="shift" required><br><br>
            <label for="shift" class="form-label">Shift:</label>
          </div>
          @if(isset($decryptedText))
          <h2>Decrypted Text: {{ $decryptedText }}</h2>
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



