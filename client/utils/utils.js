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

    //sha1 for jquery https://gist.github.com/daoiqi/4dee306de59649c38243
    (function(v){function q(b){var e="",k;for(k=7;0<=k;k--){var p=b>>>4*k&15;e+=p.toString(16)}return e}function l(b,e){return b<<e|b>>>32-e}v.extend({sha1:function(b){var e=Array(80),k=1732584193,p=4023233417,r=2562383102,t=271733878,u=3285377520;var a=b.replace(/\x0d\x0a/g,"\n");var f="";for(b=0;b<a.length;b++){var d=a.charCodeAt(b);128>d?f+=String.fromCharCode(d):(127<d&&2048>d?f+=String.fromCharCode(d>>6|192):(f+=String.fromCharCode(d>>12|224),f+=String.fromCharCode(d>>6&63|128)),f+=String.fromCharCode(d&
    63|128))}b=f;var c=b.length;f=[];for(a=0;a<c-3;a+=4)d=b.charCodeAt(a)<<24|b.charCodeAt(a+1)<<16|b.charCodeAt(a+2)<<8|b.charCodeAt(a+3),f.push(d);switch(c%4){case 0:a=2147483648;break;case 1:a=b.charCodeAt(c-1)<<24|8388608;break;case 2:a=b.charCodeAt(c-2)<<24|b.charCodeAt(c-1)<<16|32768;break;case 3:a=b.charCodeAt(c-3)<<24|b.charCodeAt(c-2)<<16|b.charCodeAt(c-1)<<8|128}for(f.push(a);14!=f.length%16;)f.push(0);f.push(c>>>29);f.push(c<<3&4294967295);for(b=0;b<f.length;b+=16){for(a=0;16>a;a++)e[a]=f[b+
    a];for(a=16;79>=a;a++)e[a]=l(e[a-3]^e[a-8]^e[a-14]^e[a-16],1);d=k;c=p;var g=r;var h=t;var m=u;for(a=0;19>=a;a++){var n=l(d,5)+(c&g|~c&h)+m+e[a]+1518500249&4294967295;m=h;h=g;g=l(c,30);c=d;d=n}for(a=20;39>=a;a++)n=l(d,5)+(c^g^h)+m+e[a]+1859775393&4294967295,m=h,h=g,g=l(c,30),c=d,d=n;for(a=40;59>=a;a++)n=l(d,5)+(c&g|c&h|g&h)+m+e[a]+2400959708&4294967295,m=h,h=g,g=l(c,30),c=d,d=n;for(a=60;79>=a;a++)n=l(d,5)+(c^g^h)+m+e[a]+3395469782&4294967295,m=h,h=g,g=l(c,30),c=d,d=n;k=k+d&4294967295;p=p+c&4294967295;
    r=r+g&4294967295;t=t+h&4294967295;u=u+m&4294967295}n=q(k)+q(p)+q(r)+q(t)+q(u);return n.toLowerCase()}})})(jQuery);

    $(document).ajaxStart(function () {
        $('body').css('cursor', 'wait');
    }).ajaxStop(function () {
        $('body').css('cursor', 'auto');
    });
  });