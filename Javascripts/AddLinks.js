function addlinks(code)
{

	// create the xml object
	var XMLobject = new XMLHttpRequest();

	var PHPfile = "../PHPfunctions/SubmitLinks.php";
	var links = escape(document.getElementById("links-" + code).value);
	var User_Variables = "linklist=" + links + "&code=" + code;
	XMLobject.open("POST",PHPfile,true);
	//Set contect type header
	XMLobject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//acccess the onreadystate event
        
	XMLobject.onreadystatechange = function()
	{
     	if(XMLobject.readyState ==4 && XMLobject.status  ==200)
		{
			$("#status").fadeIn();
			var return_data = XMLobject.responseText;
			document.getElementById("status").innerHTML = return_data;
		}

	}
	
            
	//send the data to te PHP file
	XMLobject.send(User_Variables);
	document.getElementById("links-" + code).value = '';
	
        
	setTimeout(function()
	{
		document.getElementById('status').clear;
		$("#status").fadeOut();
  	}, 
  		3000);
  	
    //Jquery For New Link List
    AddNewLinks(code, links);
	
	
}






function AddNewLinks(code, links){
    var pass_code = "code=" + code + "&links=" + links;
	
	 $.ajax({
            type: "POST",
            url: "../PHPfunctions/LinksAJAX.php",
            data: pass_code,
            cache: false,
            success: function(new_link){
		
		$('#link-cluster-ajax-' + code).prepend(new_link);
		
	    }
	});
}

function OpenInNewTab(url)
{
  var win=window.open(url, '_blank');
  win.focus();
}


function open_links(code)
{


	var pass_code = "code=" +code;
        $.ajax({
                type: "POST",
                url: "../PHPfunctions/OpenLinks.php",
                data: pass_code,
                cache: false,
                success: function(array_pass){
                    var result = eval(array_pass);
		    URLcount = 1;
    
	

			for (var urlone in result) {
				var SingleURL = result[urlone];
				
				// HTMl to enter invisibly for each link in the panel
				Anchor = '<a  id="navigate-'+ code + '-' + URLcount + '" href="' + SingleURL + '" target="_blank"></a>';
				//DivTrigger = '<div id="firing-div-'+ code + '-' + URLcount + '"></div>';

				window.open(SingleURL);
				$("#invisible-navigator-" + code).append(Anchor);
				//document.getElementById('navigate-'+ code + '-' + URLcount).click();
				URLcount = URLcount + 1;
			}
			
				
		    
                }
            });
  
}


