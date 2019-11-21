serverCall = function(endPoint, args) {
  return singlePageJsRequest(endPoint, args );
  };

//backwards compatibality
if (!Object.entries)
  Object.entries = function( obj ){
    var ownProps = Object.keys( obj ),
        i = ownProps.length,
        resArray = new Array(i); 
    while (i--)
      resArray[i] = [ownProps[i], obj[ownProps[i]]];

    return resArray;
  };

document.addEventListener("DOMContentLoaded", function(event) { 
    $(document).ajaxStart(function () {
        $('body').css('cursor', 'wait');
    }).ajaxStop(function () {
        $('body').css('cursor', 'auto');
    });
  });