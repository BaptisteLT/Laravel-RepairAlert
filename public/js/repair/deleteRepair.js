function deleteRepair(uuid, csrf)
{
    if(confirm('Are you sure to delete this item?'))
    {
        fetch('/repair/delete/'+uuid, {
            method: "DELETE",
            headers: {
                'X-CSRF-TOKEN': csrf
            },
        })
        //Suppression de la ligne du tableau
        .then((response) => {
            if(response.status === 200)
            {
                console.log(response);
                document.getElementById('repair-'+uuid).remove();
            }
            else
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
}
