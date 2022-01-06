//Affiche le résultat du voyage
function resultTravel(depart, arrivee, nbpersonne) {
    $.ajax({
            //L'URL de la requête 
            url: 'dispatcherAjax.php?action=resultTravel&depart=' + depart + '&arrivee=' + arrivee + '&nbpersonne=' + nbpersonne,

            //La méthode d'envoi (type de requête)
            method: 'GET',
        })
        //Ce code sera exécuté en cas de succès
        .done(function(response) {
            $('#resultTravel').html(response);
        });
}