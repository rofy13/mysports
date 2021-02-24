
function addformvalidate(form){
var name=form.name.value;
var trimmedname = name.trim();

var description=form.description.value;
var trimmedddescription = description.trim();
var formdate=form.date.value;

var currentdate = new Date();
currentdate.setHours(0,0,0,0);


var parts = formdate.split('-');

var mydate = new Date(parts[0], parts[1] - 1, parts[2]);


if ((trimmedname==null || trimmedname=="")){
  alert("Name can't be blank");
  window.setTimeout(function ()
    {
        form.name.focus();
    }, 0);
  return false;
}else if (parseInt(trimmedname.length) > 24) {
  alert("Name is too long");
  window.setTimeout(function ()
    {
        form.name.focus();
    }, 0);
  return false;
}else if(trimmedddescription==null || trimmedddescription==""){
  alert("Description can't be blank");
  window.setTimeout(function ()
    {
        form.description.focus();
    }, 0);
    return false;
}else if (parseInt(trimmedddescription.length) > 199) {
  alert("Description is too long");
  window.setTimeout(function ()
    {
        form.description.focus();
    }, 0);
  return false;
}else if(mydate<currentdate){
  alert("you have set date from past");
  window.setTimeout(function ()
    {
        form.date.focus();
    }, 0);
    return false;
}

}
