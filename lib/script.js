var n_file = 0;
var sum_file = 0;
var added_fname = new Array();
var fname_index = 0;

function add_file() {
  if (sum_file < 5) {
    var input = "<div class=\"select_file\"><button type=\"button\">파일 선택</button><input type=\"file\" name=\"file[]\" onchange=\"show_fname(this, " + String(n_file) + ")\"><div class=\"file_name\"></div><img src=\"/images/delete.png\" alt=\"delete\" onclick=\"delete_finput(" + String(n_file) + ")\"></div>\n";
    var add_file = document.getElementsByClassName('add_file')[0];

    add_file.innerHTML += input;
    ++sum_file;
    ++n_file;

    var file_path = document.querySelectorAll('.file_name');
    for (var i = 0; i < file_path.length - n_file; i++) {
      file_path[i].innerHTML = "";
    }
  }
}

function delete_finput(nth) {
  var str = "<div class=\"select_file\"><button type=\"button\">파일 선택</button><input type=\"file\" name=\"file[]\" onchange=\"show_fname(this, " + nth + ")\"><div class=\"file_name\"></div><img src=\"/images/delete.png\" alt=\"delete\" onclick=\"delete_finput(" + nth + ")\"></div>\n"
  var add_file = document.getElementsByClassName('add_file')[0];
  --sum_file;

  add_file.innerHTML = add_file.innerHTML.replace(str, "");
}

function delete_file(img, fname) {
  if (added_fname.indexOf(fname) == -1) {
    var input = "<input type=\"hidden\" name=\"delete[]\" value=\"" + fname +"\">"
    var delete_file = document.getElementsByClassName('delete_file')[0];
    img.style.backgroundColor = "gray";
    img.setAttribute('onclick', "cancle_delete(this, fname='" + fname + "')");

    delete_file.innerHTML += input;
    added_fname[fname_index] = fname;
  }
}

function cancle_delete(img, fname) {
  var delete_file = document.getElementsByClassName('delete_file')[0];
  var str = "<input type=\"hidden\" name=\"delete[]\" value=\"" + fname +"\">";

  img.style.backgroundColor = "white";
  img.setAttribute('onclick', "delete_file(this, fname='" + fname + "')");

  delete_file.innerHTML = delete_file.innerHTML.replace(str, "");
  added_fname.splice(added_fname.indexOf(fname), 1);
}

function show_fname(file, nth) {
  document.getElementsByClassName('file_name')[nth].innerHTML = file.value;
}
