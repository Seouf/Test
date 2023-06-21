var nomes = [
    "Lunanegra (28)",
    "Crysta (70)",
    "Owls (70)",
    "Fortress (70)",
    "Paradis (70)",
    "Thread (70)",
    "Confusione (34)",
    "Cabarë (70)",
    "LASP (49)",
    "AngheloCity (70)",
    "cu (52)",
    "Tulandia (70)",
    "tonyx (40)"
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

