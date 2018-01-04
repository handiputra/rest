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
			var Ekonomi=0;
			var sospol=0;
			var Pendidikan=0;
			var Psikologi=0;
			var Jumlah = {
				arrJumlah : []
			};

			var len = json.mahasiswa.length;
			var mahasiswa = json.mahasiswa;

			for (var i = 0; i <= len; i++) {
				//Jumlah.arrJumlah.push(data[i].score);
				if (i<len) {
					if ((mahasiswa[i].jurusan == "Informatika")|| (mahasiswa[i].jurusan == "Mesin")) {
						//Jumlah.arrJumlah.push(data[i].score);
						Teknik++;
						console.log("teknik ke "+ i + " " +mahasiswa[i].jurusan);
						

					}
					else if (mahasiswa[i].jurusan == "Akuntansi"|| (mahasiswa[i].jurusan == "Manajemen")) {
						//score.TeamB.push(data[i].score);
						Ekonomi++;
					}
					else if (mahasiswa[i].jurusan == "IlmuKomunikasi"|| (mahasiswa[i].jurusan == "IlmuPemerintahan")||(mahasiswa[i].jurusan == "HubunganInternasional")) {
						//score.TeamB.push(data[i].score);
						sospol++;
						console.log("Sospol++ = " + mahasiswa[i].jurusan);
					}else if (mahasiswa[i].jurusan == "Matematika"|| (mahasiswa[i].jurusan == "BahasaIndonesia")||(mahasiswa[i].jurusan == "BahasaInggris")) {
						//score.TeamB.push(data[i].score);
						Pendidikan++;
						console.log("Pendidikan++ = " + mahasiswa[i].jurusan);
					}
					else if (mahasiswa[i].jurusan == "Psikologi") {
						//score.TeamB.push(data[i].score);
						Psikologi++;
						console.log("Psikologi++ = " + mahasiswa[i].jurusan);
					}
				} else if(i==len){
					Jumlah.arrJumlah.push(Teknik);
					Jumlah.arrJumlah.push(Ekonomi);
					Jumlah.arrJumlah.push(sospol);
					Jumlah.arrJumlah.push(Pendidikan);
					Jumlah.arrJumlah.push(Psikologi);
				}
			}

			//get canvas
			var ctx = $("#line-chartcanvas");
			//ctx.height = 500;

			var data = {
				labels : ["Teknik", "Ekonomi", "Sospol", "Pendidikan", "Psikologi"],
				datasets : [
					{
						label : "Jumlah",
						data : Jumlah.arrJumlah,
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
					text : " Data Mahasiswa berdasarkan Fakultas",
					fontSize : 24,
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