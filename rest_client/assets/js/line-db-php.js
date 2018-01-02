$(document).ready(function() {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	$.ajax({
		url : "http://localhost/rest/rest_client/index.php/Mahasiswa/loadData",
		type : "GET",
		success : function(data){
			console.log("Data="+ data);
			var json = JSON.parse(data);
			console.log(json);
			//console.log("Data="+ data[i]);
			var mesin=0;
			var TeamBCount=0;
			var TeamCCount=0;
			var score = {
				TeamA : [],
				TeamB : []
			};

			var len = json.mahasiswa.length;
			var mahasiswa = json.mahasiswa;

			for (var i = 0; i <= len; i++) {
				//score.TeamA.push(data[i].score);
				if (i<len) {
					if (mahasiswa[i].jurusan == "Mesin") {
						//score.TeamA.push(data[i].score);
						mesin++;
						

					}
					else if (data[i].team == "TeamB") {
						//score.TeamB.push(data[i].score);
						TeamBCount++;
					}
					else if (data[i].team == "TeamC") {
						//score.TeamB.push(data[i].score);
						TeamCCount++;
					}
				} else if(i==len){
					score.TeamA.push(mesin);
					score.TeamA.push(TeamBCount);
					score.TeamA.push(TeamCCount);
				}
			}

			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : ["Teknik", "Ekonomi", "Pendidikan", "Ilkom", "Psikologi"],
				datasets : [
					{
						label : "TeamA score",
						data : score.TeamA,
						backgroundColor : "blue",
						borderColor : "lightblue",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "TeamB score",
						data : score.TeamB,
						backgroundColor : "green",
						borderColor : "lightgreen",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					}
				]
			};

			var options = {
				title : {
					display : true,
					position : "top",
					text : "Jurusan",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				}
			};

			var chart = new Chart( ctx, {
				type : "line",
				data : data,
				options : options
			} ); 

		},
		error : function(data) {
			console.log("Err ="+data);
		}
	});

});