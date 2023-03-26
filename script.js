    
$(document).ready(function() {
    $(".ipt_pass a").on("click", function(event) {
        event.preventDefault();
        var parent = $(this).parent().parent().parent();
        if(parent.find("input:eq(0)").attr("type") == "text"){
            parent.find("input:eq(0)").attr("type", "password");
            parent.find("i:eq(0)").addClass( "la-eye-slash" );
            parent.find("i:eq(0)").removeClass( "la-eye" );
        }else if(parent.find("input:eq(0)").attr("type") == "password"){
            parent.find("input:eq(0)").attr("type", "text");
            parent.find("i:eq(0)").removeClass( "la-eye-slash" );
            parent.find("i:eq(0)").addClass( "la-eye" );
        }
    });
});  