var ToC =
  "<nav role='navigation' class='toc toc_body'>" +
    "<h2>Contents</h2>" +
    "<ul>";

var newLine, el, title, link, count = 0;

jQuery("article h2").each(function() {

  count++;

  el = jQuery(this);
  title = el.text();

  if ( el.attr( 'id' ) ) {
    link = '#' + el.attr( 'id' );
  } else {
    el.attr( 'id', 'section-' + count )
    link = '#section-' + count;
  }

  newLine =
    "<li>" +
      "<a href='" + link + "'>" +
        title +
      "</a>" +
    "</li>";

  ToC += newLine;

});

ToC +=
   "</ul>" +
  "</nav>";

if ( document.querySelector( 'h2' ) ) {
  jQuery(".entry-content").prepend(ToC);
}
