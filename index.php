<!doctype html>
<html lang="en">
  <head>
    <title>PGP image quote generator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A simple PHP text to image project that adds a text on an image coming from unsplash.com source made by Mohamed Zarroug"/>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.11.2/css/pro.min.css" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

<?php
$url    = 'quote.json';
$quote_number = rand(0,5438);
$obj    = json_decode(file_get_contents($url), true);
$quote  = $obj[$quote_number]['content'];
$author = strtoupper($obj[$quote_number]['author']);
$user   = "@Quoteawakeness";
$params = '?author=' . $author . '&quote=' . $quote . '&user=' . $user;
?>

<div class="card mx-auto   border-0 rounded-0 shadow-lg  " style="width: 450px; background:#000;">
  <img  src="image.php<?php
echo $params;
?>" class="    card-img-top bg-light rounded-0" style=" background:url(https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif) center/50% no-repeat; "  width="450"  height="450" alt="image with text quote">
  <div class="card-body  text-white">
  <div class="container w-100">


  </div>





      


    <div class="form-group">
    <label  >  <a  href="JavaScript:Void(0);" title="copy the textarea for instagram use" id="copy" style="background-color: rgba(255, 255, 255, 0.3) !important; color:white !important;" class="badge  badge-light  " >Copy <i class="fad fa-copy"></i></a></label>

    <textarea id="textArea" class="form-control"  rows="12"> <?php
echo "📖 " . $quote . "&#13;&#10; -" . $author . "&#13;&#10;.&#13;&#10;.&#13;&#10;.&#13;&#10;.&#13;&#10;#quotes #love #quote #quoteoftheday #motivation #quotestoliveby #life #wonderlust #lovequotes #inspiration #spirit #poetry #world #instagram #inspirationalquotes #quotesindonesia #lifequotes #reading #quotesaboutlife #alone #quotesoftheday #quotesdaily #friendship #quotegasm #quoteawakeness #quotestagram #writersofinstagram #wisdom #photography #bookstagram";
?></textarea>
  </div>


     <a href="image.php<?php
echo $params;
?>"class="btn btn-warning">Download it <i class="fad fa-arrow-circle-down"></i></a> <button class="btn btn-outline-light" onClick="window.location.reload();">Another Quote <i class="fad fa-redo-alt"></i></button>




  </div>
</div>


<div class="container my-5 small text-center" style="max-width:450px;"> 
A simple PHP text to image project that adds a text on an image coming from <a class="text-dark" href="https://source.unsplash.com/"><b> unsplash.com </b></a> source made with <i class="text-danger fad fa-heart-circle"></i> by  <a class="text-dark" href="https://github.com/MedZed"><b> Mohamed Zarroug</b></a>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>


    var quote = <?php echo strlen ($quote) ?>;
    if(quote>200){
        location.reload();
        alert("Quote is too big for the image!");
    }


    $("#copy").click(function(){
        $("#textArea").select();
        document.execCommand('Copy');
        $("#copy").html('Copied <i class="fas fa-check-circle"></i>');
        setTimeout(function() { $("#copy").html('Copy <i class="fad fa-copy"></i>') }, 1500);
    });

     </script>
  </body>
</html>










 