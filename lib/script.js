var n_file = 0;

function add_file() {
  if (n_file < 5) {
    var input = "<input type=\"file\" name=\"file[]\">\n";
    $('.add_file')[0].innerHTML = $('.add_file')[0].innerHTML.concat(input);
    n_file++;
  }
}
