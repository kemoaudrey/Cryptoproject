<!DOCTYPE html>
<html>
<head>
    <title>Playfair Cipher</title>
    <style>
           /* .box {
position: absolute;
top: 50%;
left: 20%;
width: 400px;
padding: 40px;
transform: translate(-50%, -50%);
background: rgba(24, 20, 20, 0.987);
box-sizing: border-box;
box-shadow: 0 15px 25px rgba(0,0,0,.6);
border-radius: 10px;
}  */

 .user {
position: relative;
}

 .user input {
width: 100%;
padding: 10px 0;
font-size: 16px;
color: black;
margin-bottom: 30px;
border: black;
border-bottom: 1px solid black;
outline: none;
background: transparent;
}

 .user label {
position: absolute;
top: 0;
left: 0;
padding: 10px 0;
font-size: 19px;
color: black;
pointer-events: none;
transition: .5s;
}
h2{
color: black; 
}

.user input:focus ~ label,
.user input:valid ~ label {
top: -20px;
left: 0;
color: black;
font-size: 19px;
}
        table {
          margin: 1rem 0;
          width: 100%;
        }
        td {
          border: 1px solid gray;
          padding: 0.5rem;
          max-width: 30px;
          text-align: center;
          font-size: 16px;
        }
        ul,
        li {
          margin: 10px 35px;
        }
      </style>
      @include('style')
</head>
<body>
  <a href="/">
    <button class="cta">
      <span>Go Back</span>
      <svg viewBox="0 0 13 10" height="10px" width="15px">
        <path d="M1,5 L11,5"></path>
       <polyline points="8 1 12 5 8 9"></polyline>
       </svg>
     </button>
   </a>
    <main class="content">
        <h1>Playfair Cipher</h1>
        <br />
        <div class="user">
            <input type="text" name="key" id="key" required>
            <label for="plaintext">Key:</label>
          </div>
          <h3 style="margin: 5px 0px -20px 0px; line-height: 16px;">
            NOTE: There should be no repetition of the alphabets in the key. <br />
          </h3>
          <button onclick="generateGrid()">
            DONE
           </button>
        <h3>
          Note: If column shows undefined please refresh page and try again.
        </h3>
  
        <table id="main_grid">
          <tr id="row1">
            <td id="col11">a</td>
            <td id="col12">b</td>
            <td id="col13">c</td>
            <td id="col14">d</td>
            <td id="col15">e</td>
          </tr>
          <tr id="row2">
            <td id="col21">f</td>
            <td id="col22">g</td>
            <td id="col23">h</td>
            <td id="col24">i/j</td>
            <td id="col25">k</td>
          </tr>
          <tr id="row3">
            <td id="col31">l</td>
            <td id="col32">m</td>
            <td id="col33">n</td>
            <td id="col34">o</td>
            <td id="col35">p</td>
          </tr>
          <tr id="row4">
            <td id="col41">q</td>
            <td id="col42">r</td>
            <td id="col43">s</td>
            <td id="col44">t</td>
            <td id="col45">u</td>
          </tr>
          <tr id="row5">
            <td id="col51">v</td>
            <td id="col52">w</td>
            <td id="col53">x</td>
            <td id="col54">y</td>
            <td id="col55">z</td>
          </tr>
        </table>
        <div class="user">
            <input type="text" name="plain_text" id="plain_text"  required>
            <label for="plaintext">Plaintext:</label>
          </div>
        <button onclick="ptFixer()">DONE</button>
  
        <h4>FIXED PLAIN TEXT IN PAIRS</h4>
        <h2 id="plain_text_display_area"></h2>
  
        <div id="grids"></div>
      </main>
      <script>
        const alphabets = [
  "a",
  "b",
  "c",
  "d",
  "e",
  "f",
  "g",
  "h",
  "i",
  "k",
  "l",
  "m",
  "n",
  "o",
  "p",
  "q",
  "r",
  "s",
  "t",
  "u",
  "v",
  "w",
  "x",
  "y",
  "z"
];

var pairs =[];

function checkAndModify(input) {
  input = input.toLowerCase();
  const pattern = /^[a-z][a-z\s]*$/ ;
  if(pattern.test(input)){
  input = input.replace(/\s/g,'');
  input = input.toLowerCase();
  return input;
  }
  else {
    alert("No digits/special symbols allowed");
  }
}

function generateGrid() {
  const key = checkAndModify(document.getElementById("key").value.toLowerCase());
  const key_length = key.length;
  const remaining_alphabets_count = 25 - key_length;
  // console.log(key, key_length);

  var row_index = 1;
  var column_index = 1;

  for (let index = 0; index < key.length; index++) {
    const element = key[index];
    if (row_index < 6 && column_index < 6) {
      // console.log(row_index, column_index);
      document.getElementById(`col${row_index}${column_index}`).innerText = element;
      document.getElementById(`col${row_index}${column_index}`).style.backgroundColor = "pink";
      column_index++;
      if (column_index === 6) {
        row_index++;
        column_index = 1;
      }
    }
  }
  
  // console.log("2nd part");

  for (let index = 0; index < key.length; index++) {
    const element = key[index];
    const i = alphabets.indexOf(element);
    if (i > -1) {
      alphabets.splice(i, 1);
    }
  }

  for (let index = 0; index < remaining_alphabets_count; index++) {
    if (row_index < 6 && column_index < 6) {
      document.getElementById(`col${row_index}${column_index}`).innerText = alphabets[index];
      document.getElementById(`col${row_index}${column_index}`).style.backgroundColor = "yellow";
      column_index++;
      if (column_index === 6) {
        row_index++;
        column_index = 1;
      }
    }
  }
}


// PT fixer

function ptFixer() {
  document.getElementById("grids").innerHTML = "";
  var plain_txt = checkAndModify(document.getElementById('plain_text').value);
  plain_txt = plain_txt.replace(/\s/g,'');
  plain_txt = plain_txt.toLowerCase();

  var plain_txt_array = plain_txt.split("");

  var fixed_plain_text_pairs = [];
  
  var counter = 0;
  var first_index = 0;
  var second_index = 1;

  var max = plain_txt_array.length;
  // console.log("Initial ",plain_txt_array, plain_txt_array.length);

  while(counter < max) {
    const first_element = plain_txt_array[first_index];
    const second_element = plain_txt_array[second_index];

    if(first_element === second_element) {
      plain_txt_array.splice(second_index, 0, "x");
      plain_txt_array.join();
      // console.log(plain_txt_array, plain_txt_array.length);
      max++;
    }

    if(plain_txt_array.length % 2 != 0) {
      plain_txt_array.push("x"); 
    }
    fixed_plain_text_pairs.push({ first: plain_txt_array[first_index],second: plain_txt_array[second_index] });    
    
    counter += 2;
    first_index  += 2;
    second_index += 2;
  }

  var fixed_pair_html_list = "<ol>";
  fixed_plain_text_pairs.forEach( e => {
    pairs.push(e);
    fixed_pair_html_list += `<li>${e.first} ${e.second}</li>`;
    makeNewGrid(e);
  })
  // setting global var pairs
  document.getElementById("plain_text_display_area").innerHTML = fixed_pair_html_list + "</ol>";
  highlightTargets();
}


// for grid generation
function makeNewGrid(pair){
  const cipher_grid = document.getElementById("main_grid").innerHTML;
  const table_hading = `<br/><hr/><br/><h2>GRID FOR: ${pair.first} ${pair.second}</h2>`;
  var my_temp_table = document.createElement("table");
  my_temp_table.id = `grid_for_${pair.first}${pair.second}`;

  my_temp_table.innerHTML = cipher_grid;
  my_temp_table.childNodes.forEach( tbody => {
    tbody.childNodes.forEach( tr => {
      tr.id = "";
      tr.childNodes.forEach( td =>{
        td.id = "";
        if(td.innerText == pair.first || td.innerText == pair.second){
          td.style.backgroundColor = "red";
          td.style.color = "white";
          // console.log(td.innerText);
        }
      })
    })
  })

  var heading = document.createElement("div");
  heading.innerHTML = table_hading;
  document.getElementById("grids").appendChild(heading);
  document.getElementById("grids").appendChild(my_temp_table);
}

// for highlighting the target char
function highlightTargets() {
  console.log(pairs);
}
// Assuming the 'pairs' array is already populated

let encryptedMessage = '';
pairs.forEach(pair => {
  encryptedMessage += pair.first + pair.second;
});

console.log(encryptedMessage);
      </script>
</body>
</html>