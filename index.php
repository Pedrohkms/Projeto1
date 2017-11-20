<html>
    <head> 
        <meta charset="utf-8">
        <title>Formulário de Contato</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script type="text/javascript">
			 $(function(){

		     	$('#inserir').click(function(){

		            var link = $('#link').val();
		            var titulo = $('#titulo').val();
		            var cat = $('#cat').val();


		            $.ajax({

		                url: 'insere.php',
		                type: 'POST',
		                data: {
		                	"link": link,
		                	"titulo": titulo,
		                	"cat":cat,
		            	},

		                success: function(result){
		                     $('#div1').append('<p id = "response">link adicionado com sucesso</p>');
		                     $('#formulario').each (function(){
            					this.reset();
        					});
		                }

		            });         

		           return false;

		    	});
		    });
		</script>
    </head>
<body>
    <div class="container">
       <br>
       <div class='row'>
          <div id="div1" class="col-sm-offset-2 col-md-8">             
             <form class="form-horizontal" action="" method="post" id="formulario">
                 <div id="mensagem" class=""></div>
                <div class="form-group">
                   <div class="col-sm-2 control-label"></div>
                   <div class="col-sm-8">
                       <input type="text" class="form-control" id="link" name="link" placeholder="Link" required>
                   </div>
                   <div class="col-sm-2 control-label"></div>
                </div>
                <div class="form-group">
                   <div class="col-sm-2 control-label"></div>
                   <div class="col-sm-8">
                       <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" required>
                   </div>
                   <div class="col-sm-2 control-label"></div>
                </div>
                <div class="form-group">
                   <div class="col-sm-2 control-label"></div>
                   <div class="col-sm-8">
                       <input type="text" class="form-control" id="cat" name="cat" placeholder="Categoria" required>
                   </div>
                   <div class="col-sm-2 control-label"></div>
                </div>                
                <div class="form-group">
                   <div class="col-sm-offset-5 col-sm-10">
                       <input type="submit" class="btn btn-primary" name="inserir" id="inserir" value="Inserir">
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>