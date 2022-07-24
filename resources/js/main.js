
var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new Tooltip(tooltipTriggerEl);
});
$(".alerta").fadeTo(2000, 500).slideUp(500, function () {
  $(".alerta").slideUp(500);
});
// $("document").ready(function () {
//   setTimeout(function () {
//     $("div.alert").remove();
//   }, 5000);
// });

