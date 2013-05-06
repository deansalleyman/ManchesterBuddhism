var body = document.body || document.documentElement, 
    attries = body.attributes,
    bodyClassArray     = [];

for(var i=0, len=attries.length; i<len; i++){
    var attr = attries[i];
    if(attr.specified){  
        var attr_name = attr.nodeName,  
            attr_val  = attr_name === "style" ? body.style.cssText  
                                              : attr.nodeValue;
                                              
 	  var n=attr_val.split(" "); 
      for (var b=0; b < n.length; b++){
      bodyClassArray.push(n[b]);
      }//end loop through each class                               
       
    }//end if set
}//end loop through body attributes


jQuery(document).ready(function($) {

$('#quote_list').cycle({
    speed: 1200,
    manualSpeed: 1200,
    slides: '> .slide-content',
    fx:'scrollHorz',
    autoHeight:true,
    paused: false
});

//$('#carousel').cycle({
//    speed: 1200,
//    manualSpeed: 1200,
//    slides: '>  .slide-content',
//    fx:'scrollHorz',
//    autoHeight:false,
//    paused: false
//});


if($.inArray('pricing', bodyClassArray)>-1){

}







});/*end jquery ready*/