

function openTab(a) {
  var dialog = document.getElementById(a);
  if (dialog) {
    dialog.showModal();
  }
}

function closeTab(a) {
  var dialog = document.getElementById(a);
  if (dialog) {
    dialog.close();
  }
}
