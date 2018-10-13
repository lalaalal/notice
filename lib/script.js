var n_file = 0;

function add_file() {
  if (n_file < 5) {
    var input = "<div class=\"select_file\"><button type=\"button\">파일 선택</button><input type=\"file\" name=\"file[]\" onchange=\"show_fname(this, " + String(n_file) + ")\"><div class=\"file_path\"></div></div>\n";
    var add_file = document.getElementsByClassName('add_file');

    add_file[0].innerHTML = add_file[0].innerHTML.concat(input);
    n_file++;

    var file_path = document.querySelectorAll('.file_path');
    for (var i = 0; i < file_path.length; i++) {
      file_path[i].innerHTML = "";
    }
  }
}

function show_fname(file, nth) {
  document.getElementsByClassName('file_path')[nth].innerHTML = file.value;
}
