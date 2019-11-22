
function processResponse(response){
    var res = null; var actionJS = null;
    var process = function(item){
        try{
            eval(item);
        } catch(e) {
            console.log(responseItem[0][1]);
            console.log(e);
        }
    }
    
    try {
        res = JSON.parse(response);
    } catch (e){
        console.log(e);
    }
    for(action in res){
        if (Object.keys(res[action]).length != 1  &&
                (res[action]['verify'] == undefined && 
                res[action]['js'] != undefined))  {
            throw new "response not valid";
        } try{
            responseItem = Object.entries(res[action]);
            actionJS = responseItem[0][0];
            ($.sha1(JSON.stringify(responseItem[0][1])) ==
                responseItem[1][1]) ? process(responseItem[0][1]) : 
                console.log("checksum mismatch");
        } catch(e){
            throw new "can not decode response";
        }
        if(actionJS == "js"){
            process(responseItem[0][1]);
        } else if(actionJS == "call") {
            process((function (item) {
                call = []; args = [];
                call.push(item[0][1][0]);
                (item[0][1]).shift();call.push("(");
                if(item[0][1].length == 0){
                    call.push(");");
                    return call.join('');
                } for(ai=0;ai<(item[0][1][0]).length;ai++){
                    args.push(item[0][1][0][ai]);
                    call.push("args["+ai+"],");
                } call.push(");"); 
                return call.join('');
              })(responseItem));
        } else if(actionJS == "assign"){
            asssignItem = Object.entries(responseItem[0][1]);
            keyValue =  Object.entries(asssignItem[0][1]);
            value = keyValue[0][1];
            (value == "") ? $('#'+asssignItem[0][0]+'').empty() :
                    $('#'+asssignItem[0][0]).html(value);
        } else {
            throw new "not Implemented";
        }
    }
}
