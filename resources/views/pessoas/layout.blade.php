<!DOCTYPE html>
<html>
<head>
    <title>Access Cred</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
  
<div class="container">
    @yield('content')
</div>
<script src="http://code.jquery.com/jquery-3.0.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {

    	$("#cep").mask("99999-999",{completed:function(){
    		var cep = $(this).val().replace(/[^0-9]/, "");
    		if(cep.length != 8){
    			return false;
    		}
    		var url = "http://viacep.com.br/ws/"+cep+"/json/";

    		$.getJSON(url, function(dadosRetorno){
    			try{
    				// Preenche os campos de acordo com o retorno da pesquisa
    				$("#endereco").val(dadosRetorno.logradouro);
    				$("#bairro").val(dadosRetorno.bairro);
    				$("#cidade").val(dadosRetorno.localidade);
    				$("#uf").val(dadosRetorno.uf);
    				$("#nr_end").focus();
    			}catch(ex){}
    		});
    	}});
    });
</script>
</body>
</html>