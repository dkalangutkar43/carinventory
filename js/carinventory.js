function open_manufacture()
{
	document.getElementById("manufacture").style.display = "";
	document.getElementById("model").style.display = "none";
	document.getElementById("view_inventory").style.display = "none";
	
}

function open_view()
{
	document.getElementById("manufacture").style.display = "none";
	document.getElementById("model").style.display = "none";
	document.getElementById("view_inventory").style.display = "";
	//viewinventory();
}

function viewinventory()
{
	$.ajax({
		type: "POST",
		url: "carinventory.php", 
		data:{switchcase : "viewinventory"},
		success: function(result)
		{
			document.getElementById("view_inventory_table").innerHTML = result;
		}
	});	
}



function buildmanufacturer() {
	$.ajax({
		type: "POST",
		url: "carinventory.php", 
		data:{switchcase : "getmanufacturer"},
		success: function(result)
		{
			document.getElementById("manu_select").innerHTML = result;
		}
	});	
}
	
function open_model()
{
	document.getElementById("manufacture").style.display = "none";
	document.getElementById("model").style.display = "";
	document.getElementById("view_inventory").style.display = "none";
	buildmanufacturer();	
}

function validate_manu()
{
	var err = 0;
	if(document.getElementById("manufacturer").value == "")
	{
		err++;
	}
	if(err > 0)
	{
		return false;
	}
	return true;
}

function validate_model()
{
	var err = 0;
	if(document.getElementById("modelname").value == "")
	{
		err++;
	}
	if(err > 0)
	{
		return false;
	}
	return true;
}

function soldaction(id)
{
	var count = document.getElementById("row_"+id).value;
	console.log(count);
	if(count > 0)
	{		
		var soldcount  = count - 1;
		document.getElementById("td_"+id).innerHTML = soldcount;
		document.getElementById("row_"+id).value = soldcount;
		if (soldcount == 0) {
			document.getElementById("tr_"+id).style.display = "none";
		}
		$.ajax({
			type: "POST",
			url: "carinventory.php", 
			data:{model_id:id,model_count:soldcount ,switchcase : "soldmodel"},
			success: function(result)
			{
				if(result == 1){
					alert("Car Sold");
				}
			}
		});
	} else {
		document.getElementById("tr_"+id).style.display = "none";
	}
}


$(document).ready( function () {
    $('#example').DataTable();
} );

$(document).ready(function(){	
    $("#manu_butt").click(function()
	{
		var status = validate_manu();
		if(status)
		{
			var manu = document.getElementById("manufacturer").value;
			$.ajax({
				type: "POST",
				url: "carinventory.php", 
				data:{manu_name:manu, switchcase : "addmanufacturer"},
				success: function(result)
				{
					if(result == 1){
						alert("Manufacturer Added Successfully!");
						document.getElementById("manufacturer").value = "";
					} else {
						document.getElementById("manufacturer").focus();
					}
				}
			});
		}
		else
		{
			document.getElementById("manufacturer").focus();
		}
    });
	
	
	
	$("#btnmodel").click(function()
	{
		var status = validate_model();
		if(status)
		{
			var model_name = document.getElementById("modelname").value;
			var manufacturerid = document.getElementById("manu_select").value;
			$.ajax({
				type: "POST",
				url: "carinventory.php", 
				data:{model_name:model_name, manufacturerid:manufacturerid, switchcase : "addmodel"},
				success: function(result)
				{
					if(result == 1){
						alert("Model Added Successfully!");
						document.getElementById("modelname").value = "";
						document.location.reload();
					} else {
						document.getElementById("modelname").focus();
					}
				}
			});
		}
		else
		{
			document.getElementById("modelname").focus();
		}
    });
});