$(document).ready(function () {
   $('.right-content .content a').on('click',function (e) {
       e.preventDefault();
       let attrClass = $(this).parent().attr('data-class');
        $('.left-content').addClass('d-none');
        $('.' + attrClass).removeClass('d-none');
   });
});