var nomes = [
    "Fango",
    "Masshiro",
    "Fanta",
    "Ashlley",
    "Rubbra",
    "Kana",
    "Arkalis",
    "Kyva",
]

var $js_filtro = $("#nomes-filtrados");

for (var i = 0 ; i < nomes.length ; i++) {
    $js_filtro.append("<li>" + nomes[i] + "</li>");
}

var $filtro = $("#filtro");

$filtro.on("keyup", function(event){
var atual = event.target.value
var valores = nomes.filter(function(nome) {
    return nome.toLowerCase().indexOf(atual.toLowerCase()) > -1
})
console.log(valores)

$js_filtro.empty()
for (var i = 0 ; i <valores.length ; i++){
    $js_filtro.append("<li>" + valores[i] + "</li>")
}
})

