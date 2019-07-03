
function isUserInSenai(){
    var long = 0, lati = 0;

    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){ // callback de sucesso
            long = position.coords.longitude;
            lati = position.coords.latitude;
            if ((long > -38.386000 || long < -38.389900) || (lati > -12.937000 || lati < -12.939900)) {
                console.log("aq");
                return true;
            }
            return false;
        }, 
        function(error){ // callback de erro
            alert('Erro ao obter localização!');
            console.log('Erro ao obter localização.', error);
            return false;
        });
    } else {
        alert('Navegador não suporta Geolocalização!');
        return false;
    }
}

   


 


