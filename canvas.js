var textAdded = 0;
var canvas = new fabric.Canvas('canvas');

document.getElementById('file').addEventListener("change", function (e)
{
  var file = e.target.files[0];
  var reader = new FileReader();
  console.log("reader   " + reader);
  
  reader.onload = function (f)
  {
    var data = f.target.result;
    fabric.Image.fromURL(data, function (img)
    {
      var oImg = img.set({left: 70, top: 100, width: 250, height: 200, angle: 0}).scale(0.9);
      canvas.add(oImg).renderAll();
      if (!textAdded)
      {
        var oText = new fabric.IText('Tap and Type',
        { 
          left: 100, 
          top: 100 ,
        });

        canvas.add(oText);
        canvas.setActiveObject(oText);
        $('#fill, #font').trigger('change');
        textAdded = true;
      }
      else
      {
        canvas.setActiveObject(oImg);  
      }
    });
  };
  reader.readAsDataURL(file);
});

$('#fill').change(function()
{
  var obj = canvas.getActiveObject();
  
  if(obj)
  {
    obj.setFill($(this).val());
  }
  canvas.renderAll();
});

$('#font').change(function()
{
  var obj = canvas.getActiveObject();

  if(obj)
  {
    obj.setFontFamily($(this).val());
  }
  canvas.renderAll();
});

document.querySelector('#txt').onclick = function (e) 
{
  e.preventDefault();
  canvas.deactivateAll().renderAll();
  document.querySelector('#preview').src = canvas.toDataURL();
};

$('#duplicate-item').on('click', function(event)
{
event.preventDefault();

if(canvas.setActiveObject(img))
{
  var actObj = canvas.getActiveObject(img);  
  console.log('active object'+actObj);      
  var clone = fabric.util.object.clone(canvas.getActiveObject());
  clone.set({left: actObj.left+Math.random()*10,top: actObj.top+Math.random()*10});
  clone.setCoords();
  canvas.add(clone); 
  canvas.renderAll();
}
});