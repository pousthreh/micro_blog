	function notif(text, ok) {
        var bkColor;
        var fontColor;
        if (!!ok) {
          bkColor = 'green';
          fontColor = 'white';
        } else {
          bkColor = 'red';
          fontColor = 'yellow';
        }

        var alerte = document.getElementById('notif');
        alerte.innerHTML = text;
        alerte.style.backgroundColor = bkColor;
        alerte.style.color = fontColor;
        alerte.style.top = '10px';
        alerte.style.visibility='visible';

        setTimeout(function(){
          alerte.style.top = '-2000px';
          
        }, 3000);
    }
	
$(function(){
	
	$("#envoyer").click(function(){
		
		if ($("#name").val() == '') {
			  notif('vous avez oublié de renseigner votre pseudo');
			 
			  return false;
		}else if($("#password").val() == ''){
			notif('vous avez oublié de renseigner votre mot de passe');
			
			return false;
		
		}else{
			
			notif('si vous etes sur la même page (UTILISATEUR inconnu) <br> si non connexion reussi ',true);
			return true;
		}	
		

	})

})
