$(document).ready(function() {
    $(".botton").click(function(e) {
        e.preventDefault();
        var self = this;
        swal({
            title: "¿Estás seguro?",
            text: "¿Estás seguro de que deseas eliminar esta noticia?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // Obtén el ID de la noticia de algún lugar, por ejemplo, un atributo de datos en el botón
                var id_noticia = $(self).data('id_noticia');

                // Haz una solicitud AJAX para eliminar la noticia
                $.ajax({
                    url: 'borrarNoticia.php', 
                    type: 'POST',
                    data: { id_noticia: id_noticia },
                    success: function(response) {
                        // Verifica si la eliminación fue exitosa
                        if (response === 'success') {
                            // Haz una segunda solicitud AJAX a 'gestionNoticias.php'
                            $.ajax({
                                url: 'gestionNoticias.php',
                                type: 'POST',
                                data: { id_noticia: id_noticia },
                                success: function(response) {
                                    // Maneja la respuesta de 'gestionNoticias.php'
                                }
                            });

                            swal("¡La noticia ha sido eliminada!", {
                                icon: "success",
                            });
                            $(self).closest('tr').remove();
                        } else {
                            swal("¡Hubo un error al eliminar la noticia!");
                        }
                    }
                });
            } else {
                swal("¡La noticia no ha sido eliminada!");
            }
        });
    });
});