
$(document).ready(function(){

  var quotes = $(".slider");
  var quoteIndex = -1;
  function showNextQuote() {
    ++quoteIndex;
    q = quotes.eq(quoteIndex % quotes.length)
    .fadeIn(2000).fadeOut(2000, showNextQuote);
    console.log(quotes.length)
  }
  showNextQuote();

  //call the function when ready
  challenges();
  advantages();

  //Actually define the slideShow()
  function challenges(){

    //*** Conditional & Variables ***//
    //Define the current img
    var current = $('#challenges .show');
    //If index != 0/false then show next img
    var next = current.next().length ?
    current.next() :
    // if index == false then show first img
    current.siblings().first();
    //*** Swap out the imgs and class ***//
    current.hide().removeClass('show');
    next.fadeIn('slow').addClass('show');

    //*** Repeat function every 3 seconds ***//
    setTimeout(challenges, 7000);
  };
  function advantages(){

    //*** Conditional & Variables ***//
    //Define the current img
    var current = $('#advantages .show');
    //If index != 0/false then show next img
    var next = current.next().length ?
    current.next() :
    // if index == false then show first img
    current.siblings().first();
    //*** Swap out the imgs and class ***//
    current.hide().removeClass('show');
    next.fadeIn('slow').addClass('show');

    //*** Repeat function every 3 seconds ***//
    setTimeout(advantages, 7000);
  };

});
