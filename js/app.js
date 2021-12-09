//Affiche le résultat du voyage
function ajax(depart, arrivee) {
    $.ajax({
            //L'URL de la requête 
            url: 'dispatcherAjax.php?action=resultTravel&depart=' + depart + '&arrivee=' + arrivee,

            //La méthode d'envoi (type de requête)
            method: 'GET',
        })
        //Ce code sera exécuté en cas de succès
        .done(function(response) {
            $('#resultTravel').html(response);
        });
}

var alertPlaceholder = document.getElementById('liveAlertPlaceholder')

//Créer une alerte avec le message et le type souhaité
function afficheAlert(message, type) {
    if (message && type) {
        var wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible d-flex align-items-center m-2" role="alert">' + "<div id='info'>" + message + "</div>" + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

        alertPlaceholder.append(wrapper)
    }
}