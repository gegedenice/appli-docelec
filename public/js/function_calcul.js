function majCalculChange(){
    var prixDevise = parseFloat(document.getElementById("prix_devise").value);
    var tauxChange = parseFloat(document.getElementById("taux_change").value);
    var prix_euro_ht = prixDevise * tauxChange;
    document.getElementById('prix_euro_ht').value = prix_euro_ht ;
    };

function majCalculTva(){
    var tauxTva = parseFloat(document.getElementById("taux_tva").value);
   var prixHt = parseFloat(document.getElementById("prix_euro_ht").value);
    var prix_ttc = prixHt + (prixHt * tauxTva / 100);
    document.getElementById('prix_ttc').value = prix_ttc ;
    };

function majCalculTvaRecup(){
     var prixHt = parseFloat(document.getElementById("prix_euro_ht").value);
    var tauxTva = parseFloat(document.getElementById("taux_tva").value);
   var prixTtc = parseFloat(document.getElementById("prix_ttc").value);
    var tauxTvaRecup = parseFloat(document.getElementById("taux_recup_tva").value);
    var prix_final = prixTtc - ((prixHt * tauxTva / 100) * tauxTvaRecup / 100);
    document.getElementById('prix_final').value = prix_final;
    };

 function majPrevCalculChange(){
     var prevPrixDevise = parseFloat(document.getElementById("prev_prix_devise").value);
    var prevTauxChange = parseFloat(document.getElementById("prev_taux_change").value);
    var prev_prix_euro_ht = prevPrixDevise * prevTauxChange;
    document.getElementById('prev_prix_euro_ht').value = prev_prix_euro_ht ;
    };  


function majPrevCalculTva(){
    var prevTauxTva = parseFloat(document.getElementById("prev_taux_tva").value);
   var prevPrixHt = parseFloat(document.getElementById("prev_prix_euro_ht").value);
    var prev_prix_ttc = prevPrixHt + (prevPrixHt * prevTauxTva / 100);
    document.getElementById('prev_prix_ttc').value = prev_prix_ttc ;
    };    

function majPrevCalculTvaRecup(){
      var prevPrixHt = parseFloat(document.getElementById("prev_prix_euro_ht").value);
    var prevTauxTva = parseFloat(document.getElementById("prev_taux_tva").value);
   var prevPrixTtc = parseFloat(document.getElementById("prev_prix_ttc").value);
    var prevTauxTvaRecup = parseFloat(document.getElementById("prev_taux_recup_tva").value);
    var prev_prix_final = prevPrixTtc - ((prevPrixHt * prevTauxTva / 100) * prevTauxTvaRecup / 100);
    document.getElementById('prev_prix_final').value = prev_prix_final;
    };
