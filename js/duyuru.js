
function JSTR_Id(id){
return document.getElementById(id);
}
function JSTR_HideDiv(){
var bilgi=JSTR_Id("bilgi");
if(! JSTR_IsClickedLink) bilgi.style.display="none";
JSTR_IsClickedLink=false;
}
function JSTR_AppToDiv(){
if(window.attachEvent){
document.attachEvent("onclick",JSTR_HideDiv);
window.attachEvent("onresize",JSTR_HideDiv);
}
else{
if(document.addEventListener){
document.addEventListener("click",JSTR_HideDiv,false);
window.addEventListener("resize",JSTR_HideDiv,false);
}
else{window.onclick=JSTR_HideDiv;window.onresize=JSTR_HideDiv;
}
}
}

var JSTR_IsClickedLink=false;
function Goster(){
var q;
q=JSTR_Id("bilgi");
q.style.display="";
JSTR_IsClickedLink=true;
}
function Gizle(){
if(JSTR_Id("bilgi").style.display.length==0) JSTR_Id("jstr_div").removeAttribute("onclick");
else JSTR_Id("jstr_div").setAttribute("onclick","Goster()");
}

(function(){JSTR_AppToDiv()}())