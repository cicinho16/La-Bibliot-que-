//La fonction sub_form est utlisé principale dans les renvois des forms de login/logout
function sub_form(page_name,form_name,action,msg,destination){
	$(document).ready(function(){
		$('#'+form_name).submit(function(e){
			e.preventDefault();
			$.ajax({
				url: page_name+'_ajax.php?action='+action,
				method:'POST',
				data:$(this).serialize(),
				error:err=>{
					console.log(err)
				},
				success:function(resp){
					console.log(resp);
					if(resp == 1){
						if(action =="inscription"){
							alert('Votre compte a été enregistré avec succès !');
						}
						location.href = destination;
					}else if(resp == 3){
						var ma_div = document.getElementById('msg_'+form_name); 
						if (ma_div === null){
							$('#'+form_name).prepend('<div class="neg mb_7" id="msg_'+form_name+'">'+msg+'</div><br/>');
						}else{
							ma_div.innerText = msg;
						}
					}else{
						alert('La confirmation du mot est érronée !');
						location.href = 'signup.php';
					}
				}
			})
		})
	})
};
//La fonction rech_book sert à lister les livres et les mettre dans la cible	
function rech_book(form_name,action,ajax_name){
	$('#'+form_name).submit(function(e){
		e.preventDefault();
		e.stopImmediatePropagation();	
		$.ajax({
			url: ajax_name+'_ajax.php?action='+action,
			type: 'POST',
			data:$(this).serialize(),
			dataType: 'JSON',
			error:function (xhr, ajaxOptions, thrownError){
				alert(xhr.status);
					alert(thrownError);
					console.log(xhr.responseText);
			},
			success: function(response){
				var len = response.length;
				var tr_str = "<div class='ligne'>"+
									"<div class='col'>"+
										
									"</div>"+
									"<div class='col'>"+
										
									"</div>	"+
									"<div class='col'>"+
										
									"</div>	"+	
								"</div>";
				if(response[0].title == "0"){
					tr_str = "<div class='col'>Aucun résultat.</div>"
				}else{
					for(var i=0; i<len; i++){
						var title = response[i].title;
						var photo = response[i].photo;
						var prix = response[i].prix;
						var idbook = response[i].idbook;
						var date_ = response[i].date_;
						var date_deb = response[i].date_deb;
						var date_fin = response[i].date_fin;

						var monaction = "&apos;" + form_name + "&apos;,&apos;purch_book&apos;,&apos;" + idbook+ "&apos;";
						var sous_titre="";
						var sous_titre0="";
						var sous_titre1="";
						var sous_titre2="";
						var class_disabled="";
						var link_to="<a href='S311MyBooks.php' title='Voir mes livres'><i class='fa fa-eye' aria-hidden='true'></i></a>";

						if(response[0].action == "tout_livre"){
							if(response[i].dejaresa == 1){
								sous_titre2="<div class='neg ml_10 mt_30'><p>Vous avez déjà ce livre parmi vos livres réservés </p>"+ link_to +"</div>";
								class_disabled= "disabled";
							}
							sous_titre="<p><button "+class_disabled+" class='btn' onclick='get_modale(&apos;" + idbook+ "&apos;,&apos;" + title+ "&apos;);'>Réserver</button></p>";
							sous_titre0="<p>"+prix+" €</p>";
						}else if(response[0].action == "achat"){
							sous_titre="<p><strong>Date de réservation: </strong></p>"+"<p class='avg'>"+date_+"</p>";
							sous_titre0="<p>"+prix+" €</p>";
							sous_titre1= "<div class='ml_20'><p><strong>Date de début: </strong>"+date_deb+"</p><br/>"+
										"<p><strong>Date de fin: </strong>"+date_fin+"</p></div>";
							sous_titre2= "<center><button class='btn' onclick='cancel_resa(&apos;" + idbook+ "&apos;);'>Annuler la réservation</button></center>";
						}else{
							sous_titre="<p class='"+response[i].class_etat+"'>"+response[i].etat+"</p>";
							sous_titre0="<p>Quantité: "+response[i].qte+" U</p>";
							sous_titre1="<div class='ml_20'><p><strong>Description: </strong>"+response[i].cmt+"</p></div>";
						}

						if ((i%3 === 0 & i+1 > 3)){
							tr_str = tr_str + "<div class='ligne'>";
						}
						tr_str = tr_str + "<div class='col'>" +
										"<div class='card'>" +
										"<div class='content'>"+
										"<div class='front'>"+
											"<div class='centred'>"+
											"<img src='./common/img/"+photo+".png' alt='Purchased books' style='width:80%'>"+
											"</div>"+
											"<div class='container' id='pruchased_books'>" +
											"<h4><b>"+title+"</b></h4>"  +
											sous_titre0 +
											"</div>" +
										"</div>" +
										"<div class='back'>"+
											sous_titre1+
											"<div class='mt_30'>"+
											"<center>"+
											sous_titre +
											"</center>"+
											"</div>"+
											sous_titre2+
										"</div>" +
										"</div>" +
										"</div>" +
									"</div>";
						if (((i+1)%3===0 & i >= 1) || i == len - 1){
							tr_str = tr_str + "</div>"
						}
					}
				}
				
				$("#contenu_"+form_name).html(tr_str);
			}
		})
	})
};
//purch_book est une fonction qui réalise les réservations pour un utilisateur donné
function purch_book(form_name,action,idbook){
		console.log("work");
		var date_deb = document.getElementById("date_deb").value;
		var date_fin = document.getElementById("date_fin").value;

		$.ajax({
			url: 'resalivre_ajax.php?action='+action,
			type: 'POST',
			data:{ idbook : idbook,date_deb: date_deb, date_fin: date_fin },
			dataType: 'JSON',
			error:function (xhr, ajaxOptions, thrownError){
				alert(xhr.status);
					alert(thrownError);
					console.log(xhr.responseText);
			},
			success: function(response){
				if(response[0].etat == "1"){
					alert("Le livre a été réservé avec succès !");
					location.href = 'S311MyBooks.php';
				}else if(response[0].etat == "2"){
					alert("Vous ne pouvez pas réserver plus que 4 livres !");
					location.href = 'S311MyBooks.php';
					
				}else{
					console.log(response[0].etat);
					alert("La réservation ne peut pas être effectuée !");
				}
			}
		})
	
};
// ask_book est une fonction pour réaliser une demande de livre
function ask_book(){
	$('#ask_book').submit(function(e){
		console.log("work");
		e.preventDefault();
		e.stopImmediatePropagation();
		$.ajax({
			url: 'resalivre_ajax.php?action=ask_book',
			type: 'POST',
			data:$(this).serialize(),
			dataType: 'JSON',
			error:function (xhr, ajaxOptions, thrownError){
				alert(xhr.status);
					alert(thrownError);
					console.log(xhr.responseText);
			},
			success: function(response){
				if(response[0].etat == "1"){
					alert("La demande a été envoyée avec succès !");
					location.href = 'S321MyBooksAsked.php';
				}else{
					alert("La demande ne peut pas être envoyée, veuillez réessayer !");
				}
			}
		})
	})
};
/*Gestion de la modale de résevation*/
function get_modale(idbook,montitre){
	// Get the modal
	var modal = document.getElementById("myModal");

	document.getElementById("monaction").value = idbook;

	document.getElementById("modtitre").innerHTML = 'Réservation du livre: ' + montitre;
	modal.style.display = "block";
};
//purch_book est une fonction qui réalise l'annulation de la réservation
function cancel_resa(idbook){
	var action = 'annul_resa';

	$.ajax({
		url: 'resalivre_ajax.php?action='+action,
		type: 'POST',
		data:{ idbook : idbook},
		dataType: 'JSON',
		error:function (xhr, ajaxOptions, thrownError){
			alert(xhr.status);
				alert(thrownError);
				console.log(xhr.responseText);
		},
		success: function(response){
			if(response[0].etat == "1"){
				alert("La réservation a été annulée avec succès !");
				location.href = 'S311MyBooks.php';
			}else{
				alert("L'annulation de la réservation ne peut pas être effectuée !");
			}
		}
	})

};