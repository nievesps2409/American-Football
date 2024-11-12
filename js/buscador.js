$(document).ready(function() { 
    // Obtener las fechas cuando se cambie la categoría
    $("#categoria").on('change', function() {
        var idCategoria = $("#categoria").val();
        $.ajax({
            url: "http://localhost/chuli/servicios.php",
            type: "POST",
            data: { function: "get_fecha", idCategoria: idCategoria },
            success: function(data) {
                console.log(data);  // Add this line to check the response data
                var fechas = $.parseJSON(data);
                $("#selectFecha").empty();
                $("#selectFecha").append("<option value='-1'>SELECCIONA UNA FECHA</option>");
                for(var i = 0; i < fechas.length; i++) {
                    var html = "<option value='" + fechas[i] + "'>" + fechas[i] + "</option>";
                    $("#selectFecha").append(html);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // Obtener los títulos de las noticias cuando se cambie la fecha
    $("#selectFecha").on('change', function() {
        var fechaSeleccionada = $("#selectFecha").val();
        var idCategoria = $("#categoria").val();
        $.ajax({
            url: "http://localhost/chuli/servicios.php",
            type: "POST",
            data: { function: "get_titulos_noticias_categoria_fecha", fecha: fechaSeleccionada, idCategoria: idCategoria },
            success: function(data) {
                console.log(data);  // Add this line to check the response data
                var titulos = $.parseJSON(data);
                $("#selectNoticia").empty();
                $("#selectNoticia").append("<option value='-1'>SELECCIONA UNA NOTICIA</option>");
                for(var i = 0; i < titulos.length; i++) {
                    var html = "<option value='" + titulos[i] + "'>" + titulos[i] + "</option>";
                    $("#selectNoticia").append(html);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $("#selectNoticia").on('change', function() {
        var idNoticia = $("#selectNoticia").val();
        if (idNoticia !== '-1') {
            $("#cargaNoticia").empty();
            $.ajax({
                url: "http://localhost/chuli/servicios.php",
                type: "POST",
                data: { function: "get_noticias_id", idNoticia: idNoticia },
                success:function(data) {
                    console.log(data);
                    var noticia = data[0];  // Cambia esta línea
                    var html = "<h4>" + noticia.titulo + "</h4>";
                    if (noticia.descripcion) {
                        html += "<p>" + noticia.descripcion + "</p>";
                    }if (noticia.imagen) {
                        html += "<img class='noticia' src='" + noticia.imagen + "' alt='Imagen de la noticia'>";
                    }
                    if (noticia.fecha) {
                        html += "<p>Fecha: " + noticia.fecha + "</p>";
                    }
                    // Añade el ID de la noticia
                    if (noticia.id) {
                        html += "<p>ID: " + noticia.id + "</p>";
                    }
                    $("#cargaNoticia").html(html);
                },
                error:function(error) {
                    console.log(error);
                }
            });
        } else {
            $("#cargaNoticia").empty();
        }
    });
});