jQuery.noConflict();

jQuery(document).ready(function ($) {
  $(".popup-close").click(function () {
    $(".popup-overlay").remove();
  });
});
