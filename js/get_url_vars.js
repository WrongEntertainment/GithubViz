/**
 * get url variables like
 * http://www.wng.cc/?VAR=xyz
 */
var getUrlVars = function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++){
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

var getUsernameFromUrl = function(){
	var vars = getUrlVars();	
}
