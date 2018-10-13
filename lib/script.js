var n_file = 0;
var added_fname = new Array();
var fname_index = 0;
function add_file() {
  if (n_file < 5) {
    var input = "<div class=\"select_file\"><button type=\"button\">파일 선택</button><input type=\"file\" name=\"file[]\" onchange=\"show_fname(this, " + String(n_file) + ")\"><div class=\"file_name\"></div></div>\n";
    var add_file = document.getElementsByClassName('add_file')[0];

    add_file.innerHTML += input;
    n_file++;

    var file_path = document.querySelectorAll('.file_name');
    for (var i = 0; i < file_path.length - n_file; i++) {
      file_path[i].innerHTML = "";
    }
  }
}

function delete_file(img, fname) {
  if (added_fname.indexOf(fname) == -1) {
    var input = "<input type=\"hidden\" name=\"delete[]\" value=\"" + fname +"\">"
    var delete_file = document.getElementsByClassName('delete_file')[0];
    img.style.backgroundColor = "gray";

    delete_file.innerHTML += input;
    added_fname[fname_index] = fname;
  }
}

function show_fname(file, nth) {
  document.getElementsByClassName('file_name')[nth].innerHTML = file.value;
}
