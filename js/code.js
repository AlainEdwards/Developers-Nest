$( document ).ready(function() {

$('pre').html('<table>'+$.map($('pre').text().split('\n'), function(t, i){
    return '<tr><td>'+(i+1)+'</td><td><code>'+t+'</code></td></tr>';
}).join('')+'</table>');​

});