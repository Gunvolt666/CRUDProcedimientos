$('#btn_new').click(function(e){

	});


	$(document).on('click', '#btn_new', function(e){

		var json = {
			"txt1": $('#txt1').val(),
			"txt2": $('#txt2').val(),
			"otros": [1,2,3,4,5],
			"nada": {
				"1": [1,2,3,4],
				"2": {"1": ""}
			}
		}

		var mat = {};

		var myjson = {"hola": "holas"};

		// mat.push(myjson);
		// mat["nada"] = myjson;
		 mat.nada = myjson;

		json.txt1;

		
	});