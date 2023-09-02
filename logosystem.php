<?php

$printLogo = $_GET["a"];

?>

<!DOCTYPE html>
<!--
Created using JS Bin
http://jsbin.com

Copyright (c) 2017 by moshfeu (http://jsbin.com/qicesa/2/edit)

Released under the MIT license: http://jsbin.mit-license.org
-->
<meta name="robots" content="noindex">
<html>
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>JS Bin</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://rawgit.com/kangax/fabric.js/master/dist/fabric.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      
    <script type="text/javascript">
      

    $(document).ready(function() { 
  var id = '#dialog';
  var maskHeight = $(document).height();
  var maskWidth = $(window).width();
  $('#mask').css({'width':maskWidth,'height':maskHeight}); 
  $('#mask').fadeIn(240); 
  $('#mask').fadeTo("slow",0.8); 
        var winH = $(window).height();
  var winW = $(window).width();
        $(id).css('top',  winH/2-$(id).height()/2);
  $(id).css('left', winW/2-$(id).width()/2);
     $(id).fadeIn(50);  
     $('.window .close').click(function (e) {
  e.preventDefault();
  $('#mask').hide();
  $('.window').hide();
     });  
     $('#mask').click(function () {
  $(this).hide();
  $('.window').hide();
 });  
 
});




    </script>

</head>

<body>

<!-- <img src="upload/php/<?php //echo $printLogo;?>" alt="Mountain View" style="width:304px;height:228px;">
 -->

<div id="boxes">
<div style="top: 50%; left: 50%; display: none;" id="dialog" class="window"> 
<div id="san">
<a href="#" class="close agree"><img src="img_base/close.png" width="32" style="float:right; margin-right: -25px; margin-top: -20px;"></a>
<div>
<img src="" width="600"></div>
</div>
</div>
<div style="width: 2478px; font-size: 32pt; color:white; height: 1202px; display: none; opacity: 0.4;" id="mask"></div>


</div>



<div class="header"><img src="img_base/logo_top.png"> </div>



<div id="conteudo">




<div class="menu">

               <input class="upload" type="file" multiple="file" id="file">

               <div class="add_text"> <button class="txt"  onclick="addText()"></button></div>

               <div class="pot_color"><input class="select_color" type="color" value="#fff" id="fill" /></div>

               <select id="font">

                  <option>arial</option>
                  <option>tahoma</option>
                  <option>Arno Pro </option>
                
                </select>

</div>

<div class="spaw_logo">
              <center>
              <h1>"Cliquez sur le symbole en forme de plus (+) pour uploader un nouveau logo"</h1>
              </center>
</div>




  <div id="pst_canvas">
   
<img class="img_fundo" src="upload/php/<?php echo $printLogo;?>" height="70%" width="75%" z-index="-1">
        <canvas id="canvas" width="1520" height="800" ></canvas>
   </div>


            <script id="jsbin-javascript">


                    var canvas = new fabric.Canvas('canvas');


                    document.getElementById('file').addEventListener("change", function (e) {

                      var file = e.target.files[0];
                      var reader = new FileReader();
                      console.log("reader   " + reader);
                      reader.onload = function (f) {
                        var data = f.target.result;
                        fabric.Image.fromURL(data, function (img) {
                          var oImg = img.set({left: 70, top: 350, width: 280, height: 300, angle: 0}).scale(0.6);


                          canvas.add(oImg).renderAll();
                          canvas.setActiveObject(oImg);  
                        });
                      };
                      reader.readAsDataURL(file);
                    });




                    $('#fill').change(function(){
                      var obj = canvas.getActiveObject();
                      if(obj){
                        obj.setFill($(this).val());
                      }
                      canvas.renderAll();
                    });

                    $('#font').change(function(){
                      var obj = canvas.getActiveObject();
                      if(obj){
                        obj.setFontFamily($(this).val());
                      }
                      canvas.renderAll();
                    });

                    function addText() {
                      var oText = new fabric.IText('TOUCHER ET ÉCRIVE', { 

                        left: 25, 
                        top: 280 ,
                        fontSize: 27,
                        fill: '#7e7d7d'


                      });


                      canvas.add(oText);
                      canvas.setActiveObject(oText);
                      $(', #font,').trigger('change');
                      oText.bringToFront();

                    }



                    document.querySelector('#txt').onclick = function (e) {
                      e.preventDefault();
                      canvas.deactivateAll().renderAll();
                      document.querySelector('#preview').src = canvas.toDataURL();
                    };





            </script>



<footer>
  
    <div id="rodape">s
    </div>
</footer>


</body>
</html>