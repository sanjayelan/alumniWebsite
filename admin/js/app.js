$(() => {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
    });
});
// $(document).ready(function () {
//     $("#req-type").change(function (e) { 
//         $("#req-type").css({"border-color":"grey"});
//         $("#fpost").removeAttr('disabled');
        
//     });
//     $("#req-disc").keyup(function (e) { 
//     var v=$("#req-type").val();
//     if(v==null){
//         $("#req-type").css({"border-color":"red"});
//         $("#fpost").attr('disabled','disabled' );
//     }
//     });
// });