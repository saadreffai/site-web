<script>
$(document).ready(function(){
    // Lorsque le formulaire est soumis
    $('#myForm').submit(function(e){
        e.preventDefault(); // Empêche le formulaire de se soumettre normalement
        
        // Récupère les données du formulaire
        var formData = $(this).serialize();
        
        // Envoie une requête Ajax au serveur
        $.ajax({
            type: 'POST', // Méthode HTTP à utiliser (POST dans ce cas)
            url: 'addbooks.php', // URL du script PHP à appeler
            data: formData, // Données à envoyer au serveur
            success: function(response){
                // Manipule la réponse du serveur (par exemple, affiche un message de réussite)
                $('#result').html(response);
            },
            error: function(xhr, status, error){
                // Gère les erreurs éventuelles
                console.error(error);
            }
        });
    });
});
</script>
