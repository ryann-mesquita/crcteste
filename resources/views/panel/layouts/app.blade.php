<!DOCTYPE html>
<html>
	<head>
		<title>CRC Grupo AlmaViva</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!--Fonts-->
		<link rel="stylesheet" href="{{url('assets/panel/css/font-awesome.min.css')}}">

		<!--CSS Person-->
		<link rel="stylesheet" href="{{url('assets/panel/css/especializati.css')}}">
		<link rel="stylesheet" href="{{url('assets/panel/css/especializati-reset.css')}}">

		<!--Favicon-->
		<link rel="icon" type="image/png" href="{{url('assets/panel/img/favicon.png')}}">
	</head>
<body>

<section class="menu">
	
	<div class="logo">
		<img src="{{url('assets/panel/imgs/icone-especializati.png')}}" alt="EspecializaTi" class="logo-painel">
	</div>

	<div class="list-menu">
		<ul class="menu-list">
			<li>
				<a href="?pag=home">
					<i class="fa fa-home" aria-hidden="true"></i>
					Home
				</a>
			</li>
		</ul>
	</div>

</section><!--End Menu-->

<section class="content">
	<div class="top-dashboard">
		
		<div class="dropdown user-dash">
		  <div class="dropdown-toggle" id="dropDownCuston" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    <img src="" alt="" class="user-dashboard img-circle">
		    <p class="user-name">Nome User</p>
		    <span class="caret"></span>
		  </div>
		  <ul class="dropdown-menu dp-menu" aria-labelledby="dropDownCuston">
		    <li><a href="#">Perfil</a></li>
		    <li><a href="#">Logout</a></li>
		  </ul>
		</div>
	</div><!--Top Dashboard-->

	<div class="content-ds">
		
		<div class="bred">
			<a href="" class="bred">Home  ></a> <a href="" class="bred">Dashboard</a>
		</div>

    @yield('content')



	</div><!--End Content DS-->

</section><!--End Content-->

	
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
<script>
    $(function(){
        $("#cpfcnpj").keydown(function(){
    try {
        $("#cpfcnpj").unmask();
    } catch (e) {}

    var tamanho = $("#cpfcnpj").val().length;

    if(tamanho < 11){
        $("#cpfcnpj").mask("999.999.999-99");
    } else {
        $("#cpfcnpj").mask("99.999.999/9999-99");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function(){
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
    });
        $("#telefone").mask("(00) 0 0000-0000");
        $('form[name="form_cadastro"]').submit(function(event){
            event.preventDefault();
            $.ajax({
                url: "{{ route('create_user') }}",
                type: "post",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    if(response.success === true){
                        $('.messageBox').css("display","block").removeClass( "alert-danger" ).addClass( "alert-success" ).html(response.message);
                    }else{
                        $('.messageBox').css("display","block").html(response.message);
                    }
                }
            });
        });
    });
</script>
	<!-- jS Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>