var issuer_name;

issuer_name = document.getElementById("issuer_main_name");

if(issuer_name.innerHTML == "TOEIC"){  
    var newscript = document.createElement('script');
    newscript.setAttribute('type','text/javascript');
    newscript.setAttribute('src','remix_issuer2.js');
    var head = document.getElementsByTagName('head')[0];
    head.appendChild(newscript);
}
else{
    var newscript = document.createElement('script');
    newscript.setAttribute('type','text/javascript');
    newscript.setAttribute('src','remix_issuer5.js');
    var head = document.getElementsByTagName('head')[0];
    head.appendChild(newscript);
}