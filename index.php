<!DOCTYPE html>
<html lang="en">
	<title>Meme Generator</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="test/colorpicker/spectrum.js"></script>
		<script type="text/javascript" src="dist/jquery.memegenerator.min.js"></script>
<!-- 		<script type="text/javascript" src="../i18n/jquery.memegenerator.pl.js"></script> -->
		
		<link rel="stylesheet" type="text/css" href="dist/jquery.memegenerator.min.css">
		<link rel="stylesheet" type="text/css" href="test/colorpicker/spectrum.css">
		<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="STYLE.css">
		<style>
		h2 {
			display: block;
			text-align: center;
		}
		
		.example {
			margin: 0 0 10% 0;
		}
		
		.bootstrap {
			width: 600px;
			margin-right: auto;
			margin-left: auto;
		}
		
		.save button {
			display: block;
			width: 100%;
			margin-bottom: 15px;
			font-size: 24px;
		}
		
		#preview {
			min-height: 200px;
			background-color: #EFEFEF;
            font-family: monospace;
            overflow-y: auto;
		}
		#preview img {
			max-width: 100%;
		}
		</style>
	</head>
<body class="hm-gradient">
<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top" >
        <div class="navbar-header">
            <a   href="http://" class="navbar-brand"><img src="" class="image" width="70"></a>
            <button class="navbar-toggle" data-toggle="collapse" data-target="#navcol-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">

                <li role="presentation"><a href="Inscription.php">Inscription </a></li>
                <li role="presentation"><a href="Authentification.php">Authentification</a></li>
                <li role="presentation"><a href="affichage.php">Affichage </a></li>

            </ul>

        </div>
    </nav>
</div>
<br><br><br>
<div class="example default" style="width: 700px">
		

		
	 <div class="upload">
        <button class="btn btn-danger"type="submit" ><input type='file' id="upload"/></button>
    </div>
    <img id="img" src="IMG/im.png" alt="your image"  name="image" width="400">
</div>


	


   
    <script type="text/javascript">
function readURL(input) {
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpg"|| ext == "jpeg"  )) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }else{
         $('#img').attr('src', '/assets/no_preview.png');
    }
}




$("#upload").change(function(){ 
        readURL(this);
    });
    </script>
  


			<div id="toolbar"></div>
			
			<div class="container">
				<div class="row">
					<div class="col-md-8" id="preview"></div>
					
					<div class="col-md-4">
						<button class="btn btn-success"  id="save">Save</button>
						<button class="btn btn-danger"type="submit" id="download">Download</button>
					</div>
				</div>
			</div>
		</div>
	
	
</body>
<script type="text/javascript">









	
	//initialisation du generator
$("#img").memeGenerator({useBootstrap: false});
		

	
		//preview image generator
				$("#save").click(function(e){
			e.preventDefault();
			
			var imageDataUrl = $("#img").memeGenerator("save");
			

	 $.ajax({
        url: "/test.php",
        type: "POST",
        data: {image: imageDataUrl},
        dataType: "json",
       success: function(e){
            $("#preview").html(
                $("<img>").attr("src",imageDataUrl)
            );
        }})

			// $("#preview").html(
			// 	$("<img>").attr("src", imageDataUrl)
			// );
		


		});



//fonction download image
		
		$("#download").click(function(e){
			e.preventDefault();
			
			$("#img").memeGenerator("download");
		});

		
	
</script>
		
		
<br><br>

</html>
