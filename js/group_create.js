function handleOnInput(el, maxlength) {
  if(el.value.length > maxlength)  {
    el.value 
      = el.value.substr(0, maxlength);
  }
}

var group_hashtag = document.getElementById('group_hashtag').innerHTML; // html 안에 'group_hashtag'라는 아이디를 group_hashtag 라는 변수로 정의한다.

var splitedArray = group_hashtag.split(' '); // 공백을 기준으로 문자열을 자른다.
var linkedContent = '';
for(var word in splitedArray)
{
  word = splitedArray[word];
   if(word.indexOf('#') == 0) // # 문자를 찾는다.
   {
      word = '<a href=\링크>'+word+'</a>';
      group_hashtag.innerHTML = "<font color=#FF002E />";
   }
   linkedContent += word+' ';
}
document.getElementById('group_hashtag').innerHTML = linkedContent;

 