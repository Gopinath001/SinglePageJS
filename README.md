# SinglePageJS

> make single page apps with php just with jQuery & no extra FrameWorks

#### _This is a demo showcasing singlePageApps with simple tools_

[![release][badge]][release link] [![license][license-badge]][license file]

[license-badge]: https://img.shields.io/github/license/gopinath001/SinglePageJS
[license file]: https://github.com/Gopinath001/SinglePageJS/blob/master/LICENSE
[badge]: https://img.shields.io/github/v/release/gopinath001/SinglePageJS?label=latest%20release
[release link]: https://github.com/Gopinath001/SinglePageJS/releases

## features

* fast & ready to work,
* only contains functions that you use
* ultra-lite, easy to get-started and understand
* execute commands from js <=> php seamlessly
* execute server side functions from client side along with arguments(ofc only allowed functions)
* change dom elements from server side
* retains order of the cmd chain

* * *

### how it works

_two scripts are present:_

client side script & server side, client side script is generated and attached to the page during inital load,
after that is done, all other interactions are done 
with server side script.

server acts as a command & control center, client just follows the commands given by the server.

all commands from the server are in queue, they are executed in order

* * *

### how it is visible

##### below is how the ajax request appears ,configure it to your liking

![''](/docs/network.png)

##### the response is decoded automatically and processed

### configurations

***change the config in the interface***

![''](/docs/configs.png)

* * *

### using gulp to combine js

all the js files are put seperately based on its logic, use gulp to generate a combined version of the script.

```bash

npm install gulp

npm install gulp=concat

gulp js-minify


```

* * *

#### > See the demo src inside Demo folder, check the  [ live demo here](https://unmaterial-zones.000webhostapp.com/singlePageJS/)

* * *

##### dependencies

* jQuery


