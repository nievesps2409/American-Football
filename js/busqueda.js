//esto es una extension dejquery para hacer busquedas en tablas, esto normamente no se programa, si no que se usa una libreria de jquery
$.expr[":"].containsCI = function(elem, i, match, array) {
    return (elem.textContent || elem.innerText || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
};

$("#filtro").keyup(function() {
    var texto = $(this).val().toLowerCase();
    $("#Busqueda tr").hide();
    $("#Busqueda tr:containsCI('" + texto + "')").show();
});