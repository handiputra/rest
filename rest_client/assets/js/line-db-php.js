$(document).ready(function() {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	$.ajax({
		url : "http://localhost/rest/rest_client/applications/controllers/Mahasiswa.php",
		type : "GET",
		success : function(data){
			console.log(data);
			var Informatika=0;
			var TeamBCount=0;
			var TeamCCount=0;
			var score = {
				TeamA : [],
				TeamB : []
			};

			var len = data.length;

			for (var i = 0; i <= len; i++) {
				//score.TeamA.push(data[i].score);
				if (i<len) {
					if (data[i].id_jurusan == "2") {
						//score.TeamA.push(data[i].score);
						Informatika++;
						

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
					score.TeamA.push(Informatika);
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