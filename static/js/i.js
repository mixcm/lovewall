function get_radio_value(name) {
    var obj = document.getElementsByName(name);
    for(var i=0; i<obj.length; i ++){
        if(obj[i].checked){
            return obj[i].value;
        }
    }
}
function get_text_value(id) {
    return document.getElementById(id).value;
}
function save(){
    a=get_radio_value("sex");
    b=get_radio_value("ismous");
    c=get_text_value("say");
    d=get_text_value("qq");
    e=get_text_value("name");
    $.get('/ajax.php',{'sex':a,'mous':b,'say':c,'qq':d,'name':e,"type":"show"},function(result,status){
        alert(result);
    })
}
