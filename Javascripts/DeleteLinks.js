
    function cancel_group(group_code){
        var pass_code = "group_code=" + group_code;
        $.ajax({
            type: "POST",
            url: "../PHPfunctions/DeleteGroup.php",
            data: pass_code,
            cache: false,
            success: function(test){
                $('#canceller-' + group_code).remove();
                
            }
        }); 
    }
    
    function deletelinks(code)
    {
        var pass_code = "code=" +code;
        $.ajax({
                type: "POST",
                url: "../PHPfunctions/DeleteLinks.php",
                data: pass_code,
                cache: false,
                success: function(){
                    $('#link-cluster-ajax-' + code).empty();
                    
                }
            }); 
    }
