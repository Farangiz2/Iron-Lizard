function validateName(x)
{
  var re = /[A-Za-z@0-9.]/
      if(re.test(document.getElementById(x).value)){
      return true;
    }else{
      // document.getElementById(x ).style.background ='#e35152';
      document.getElementById(x + 'Error').style.display = "block";
      return false; 
    }
} 