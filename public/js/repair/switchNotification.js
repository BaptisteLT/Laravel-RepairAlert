function switchNotification(uuid, csrf)
{
    fetch('/repair/switch-notification/'+uuid, {
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': csrf
        },
    })
    //Suppression de la ligne du tableau
    .then((response) => {
        if(response.status !== 200)
        {
            throw new Error('Failed to delete');
        }
    })
    //Quelque chose s'est mal passé donc on affiche une alerte.
    .catch((error) => {
        console.log(error)
        alert('An error occured: ' + error.message);
    })
}