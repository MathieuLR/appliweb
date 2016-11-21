<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    </head>
    <body>

        <div data-role="page" id="page1">

            <div data-role="header">
               
                <h3>
                Catalogue - Village Green
                </h3>
                 <div class="form-group">
                <label>Rubrique article :</label>
                <select name="rubrique" id="rubrique" class="form-control" placeholder="Rubrique article"><br>
                    <option value="0">Choisissez</option>
                    <option value="1">Guitare</option>
                    <option value="2">Djembe</option>
                    <option value="3">Batterie</option>
                    <option value="4">Amplificateur</option>
                    <option value="5">TableDeMixage</option>
                    <option value="6">Guitare électrique</option>
                    <option value="7">Guitare accoustique</option>
                </select>
                </div>
            </div>        

            <div data-role="content">
            	<div data-iscroll>
                    <ul data-role="listview" id="listview1">
    			    </ul>
    			</div>
            </div>

             <div data-role="footer" data-position="fixed">
                <h1>Village Green</h1>
            </div>    
        </div>
            <div data-role="page" id="page2">
	    			<div data-role="header">
	    			 <button id="btn2">Retour</button>
				        <h3>
				            Details article
				        </h3>
	    			</div>  

		    		<div data-role="content" id="detailsarticle">
		    		  
           			</div>
		    </div>
			

            <div data-role="footer" data-position="fixed">
                <h1>Village Green</h1>
            </div>              

     

    </body>
</html>

<script>
$("#btn2").click(function () {
	$("body").pagecontainer("change", "#page1", { transition: "flip"});
 });

var detail = null;

$("#rubrique").change(function() {   
        var id = $("#rubrique").val();
		$.get("http://127.0.0.1/fil_rouge_web/codeignitermobile/index.php/api/liste/" + id, function(data) {
            detail = data;
			//console.log(data);
            // $('#listview1').html("");
            $('#listview1').empty();//pour ecraser les données//
			for(var i in data) { //possible avec in et pas avec of//
                var obj = data[i];
				app = '<li>';
                app += '<a href="#page2" data-id="' + i + '">';
                app += obj.LibelleLongDuProduit +'<br>'; 
                app += "<img width=70px height=100px src='http://127.0.0.1/fil_rouge_web/codeignitermobile/images/APPLIMOBILE/" + obj.PhotoDuProduit + "' />";
                app +='</a>';
                app +='</li>' + '<br>';
               $('#listview1').append(app);
               
			}
            

        $("#listview1 li a").click(function(){
        var id = $(this).data("id");
        var obj = detail[id];
        $('#detailsarticle').empty();        
        $('#detailsarticle').append('<div><img src="http://127.0.0.1/fil_rouge_web/codeignitermobile/images/APPLIMOBILE/' + obj.PhotoDuProduit +'" </div>');
        $('#detailsarticle').append('<div> Prix du produit :' + obj.PrixDachatDuProduit +' "€" </div>');
        $('#detailsarticle').append('<div>Libelle du produit : '+obj.LibelleLongDuProduit+'</div>');
        $('#detailsarticle').append('<div>Identifiant du produit : '+obj.IdentifiantProduit+'</div>');

    	});
    });
});
 </script>

