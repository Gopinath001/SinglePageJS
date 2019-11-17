<html>
    <head>
        <title> Demo</title>
        <style type="text/css">
        body{
            margin: 10px auto;
            width: 80%;
            text-align: center;
            font-family:sans-serif;
        }
        .inline{
            display: inline-block;
        }
        </style>
        <script src="js/jquery-3.4.1.min.js"></script>

        <?php 

        require_once(__DIR__."/SinglePageJS/server/singlePageJS.php");
        $SinglePageJS = SinglePageJS::getInstance();
        /* this creates the page script  */
        echo $SinglePageJS->processRequest();

        ?>
        <script>
            function ManipulateDOMFromServer(){
                //passing data to server as arguments
                var simulateFormData = {"demoForm":"sampleValue"};
                simulateFormData =  btoa(JSON.stringify(simulateFormData));
                serverCall("demoEndPoint",simulateFormData);
            }

            function executeJSFromServer(){
                var simulateFormData = {"demoForm":"execute"};
                serverCall("demoEndPoint",btoa(JSON.stringify(simulateFormData)));
            }

            function callClientFunction(){
                var simulateFormData = {"demoForm":"clientFunctionCall"};
                serverCall("demoEndPoint",btoa(JSON.stringify(simulateFormData)));
            }

            function clientScript(param){
                alert("function is in client side browser but param => " + param);
            }
        </script>
    </head>
    <body>
        <div class="">
            <h4 id="para">This is a praragraph</h4> 
            <button onclick="ManipulateDOMFromServer()">click!</button>
        </div>
        <div>
            <h5 id="js-execution">
                Execute js from server</h5>
             <button onclick="executeJSFromServer()">click!</button>
        </div>
        <div>
            <h4>call client side js functions from server</h4>
             <button onclick="callClientFunction()">click!</button>
        </div>
    </body>
</html>