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
			var Teknik=0;
			var TeamBCount=0;
			var TeamCCount=0;
			var score = {
				TeamA : []
			};

			var len = json.mahasiswa.length;
			var mahasiswa = json.mahasiswa;

			for (var i = 0; i <= len; i++) {
				//score.TeamA.push(data[i].score);
				if (i<len) {
					if (mahasiswa[i].jurusan == "Mesin" || "Informatika" || "Sipil") {
						//score.TeamA.push(data[i].score);
						Teknik++;
						//console.log("teknik++ = " + mahasiswa[i].jurusan);
						

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
					score.TeamA.push(Teknik);
					score.TeamA.push(TeamBCount);
					score.TeamA.push(TeamCCount);
				}
			}

			//get canvas
			var ctx = $("#line-chartcanvas");
			//ctx.height = 500;

			var data = {
				labels : ["Teknik", "Ekonomi", "Pendidikan", "Sospol", "Psikologi"],
				datasets : [
					{
						label : "Jumlah",
						data : score.TeamA,
						backgroundColor : "blue",
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
					text : "Mahasiswa berdasarkan Jurusan",
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