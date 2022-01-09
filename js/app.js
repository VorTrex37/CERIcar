//Affiche le résultat du voyage
function resultTravel(depart, arrivee, nbpersonne, correspondance) {
    $.ajax({
            //L'URL de la requête 
            url: 'dispatcherAjax.php?action=resultTravel&depart=' + depart + '&arrivee=' + arrivee + '&nbpersonne=' + nbpersonne + '&correspondance=' + correspondance,

            //La méthode d'envoi (type de requête)
            method: 'GET',
        })
        //Ce code sera exécuté en cas de succès
        .done(function(response) {
            $('#resultTravel').html(response);
        });
}

function reserveVoyage(voyage, nbPlace) {

    $.ajax({
            //L'URL de la requête 
            url: 'dispatcherAjax.php?action=reserveVoyage',

            //La méthode d'envoi (type de requête)
            method: 'POST',

            data: { "voyage": voyage, "nbPlace": nbPlace }
        })
        //Ce code sera exécuté en cas de succès
        .done(function(response) {
            console.log(response);
            $('#reserveVoyage').html(response);
        });
}

function alertInscription(nom, prenom, pseudo, password, confpassword) {
    $.ajax({
            //L'URL de la requête 
            url: 'dispatcherAjax.php?action=alertInscription',

            //La méthode d'envoi (type de requête)
            method: 'POST',

            data: { "nom": nom, "prenom": prenom, "pseudo": pseudo, "password": password, "confpassword": confpassword, }
        })
        //Ce code sera exécuté en cas de succès
        .done(function(response) {
            $('#alertInscription').html(response);
        });
}

function alertConnexion(pseudo, password) {
    $.ajax({
            //L'URL de la requête 
            url: 'dispatcherAjax.php?action=alertConnexion',

            //La méthode d'envoi (type de requête)
            method: 'POST',

            data: { "pseudo": pseudo, "password": password }
        })
        //Ce code sera exécuté en cas de succès
        .done(function(response) {
            $('#alertConnexion').html(response);
        });
}

function redirect(session) {
    if (session) {
        setTimeout(window.location.replace("monApplication.php"), 5000);

    }
}

var alertPlaceholder = document.getElementById('liveAlertPlaceholder')

//Créer une alerte avec le message et le type souhaité
function afficheAlert(type, message) {
    if (message && type) {
        var wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible d-flex align-items-center m-2" role="alert">' + "<div id='info'>" + message + "</div>" + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

        alertPlaceholder.append(wrapper)
    }
}