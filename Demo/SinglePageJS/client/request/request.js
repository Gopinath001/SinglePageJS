singlePageJsRequest = function(endPoint, params){
    data = structServerCom(endPoint, params);
    $.ajaxSetup({
        url: spjs.config.URL,
        type: "POST",
        Headers:{
            "Content-type":"application/x-www-form-urlencoded"
        },
         error: function(jqXHR, exception) {
            if (jqXHR.status == 404) {
                error400();
            } else if (jqXHR.status == 500) {
                error500();
            }
        }
      });

    $.ajax({
        data: data,
    }).done(function(data){
        processResponse(data); 
    });      
};

function structServerCom(endPoint,data){
    comStructureHolder = {};
    comStructureHolder[spjs.config.ENDPOINT] =  endPoint;
    comStructureHolder[spjs.config.TIMESTAMP] = $.now();
    argsHolder = [];
    if(!Array.isArray(data)){
        var temp = [];
        temp.push(data);
        temp.push(btoa(JSON.stringify(
            {"anotherRandomData":"anotherData"})));
        data = temp;
    }
        
    for(x in data){
        argsHolder.push('&'+spjs.config.ENDPOINT_ARGS);
        argsHolder.push('=');
        argsHolder.push(spjs.config.ARGS_BEGIN +data[x]+ spjs.config.ARGS_END);
    }
    return $.param(comStructureHolder) + argsHolder.join('');
    
}

function error400(){
    alert('404 error');
}

function error500(){
    alert('500 error');
}