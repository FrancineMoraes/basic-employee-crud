$( document ).ready(function() {
	var botaoBuscar = $("#botaoBuscarEndereco");
    botaoBuscar.click(function(event){
        event.preventDefault();
		buscarDadosMaps();
	});
});

function buscarDadosMaps(){
	var estado = "Rio grande do Sul";
    var cidade =  $("#cidade").val();
	var rua =  $("#rua").val();

	var endereco = cidade + "+" + estado + "+" + rua;

    var campoLatitude = $("#latitude");
    var campoLongitude = $("#longitude");

	$.ajax({
        type: "GET",
        url: "https://maps.googleapis.com/maps/api/geocode/json?address="+endereco+"&key=AIzaSyAd93cr7mohWSOMLJP6Nf3eYi2it-Fh7Js",
        dataType: "json",
        success: function (data) {
        	var latitude = data["results"][0]["geometry"]["location"]["lat"];
        	var longitude = data["results"][0]["geometry"]["location"]["lng"];

            campoLatitude.val(latitude);
            campoLongitude.val(longitude);

            console.log("COORDENADAS: LAT: "+latitude);
            console.log("LONG: "+longitude);

        	customMap(latitude, longitude);
        }
    });
}
