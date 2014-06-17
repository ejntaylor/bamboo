jQuery(document).ready(function($) {
    // Code here will be executed on document ready. Use $ as normal.
    

// Plugin Deactivate - Advanced Toggle
/*
$('.bb-plugins').hide();//hide initially
$('.bb-plugins-trigger').click(function(){
      $('.bb-plugins').toggle();
  });
  
  */
   
   
// Plugins Deactivate - Select All
// http://www.sanwebe.com/2014/01/how-to-select-all-deselect-checkboxes-jquery

    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
    
});