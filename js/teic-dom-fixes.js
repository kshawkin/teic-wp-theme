jQuery('div[type="unnum"]').each(function(){

  var self = jQuery(this),
      firstElement = self.find( '> p:first' );

   jQuery( self ).contents().filter( function() {
    return this.nodeType == 3;
  }).wrap( '<h2></h2>' );


});
