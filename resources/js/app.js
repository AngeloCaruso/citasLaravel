require('./bootstrap');

$(document).ready(function () {
    $('.btnCambiarMedico').on('click', function(e){
        e.preventDefault()
    })
    $('.btnPickMedico').on('click', function(){
        let card = $(this).parents('.medico')
        let id = card.find('.medicoId').val()
        let nombre = card.find('.medicoNombre').text()
        let especialidad = card.find('.medicoEspecialidad').text()
        let ciudad = card.find('.medicoCiudad').text()

        $('.editMedicoId').val(id)
        $('.editMedicoNombre').text(nombre)
        $('.editMedicoEspecialidad').text(especialidad)
        $('.editMedicoCiudad').text(ciudad)

        $('#medicosModal').modal('hide')
    })
});