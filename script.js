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
    $js_filtro.append("<li>" + valores[i] + "</li>");
}
})
function btn_edit(event){
    var $target = $(event.target)
    var $parent = $target.parent()
    var nome = $target.parent().find(".nome").text()
    var nivel = $target.parent().find(".nivel").text()
    var ID = $target.data("id")
    $parent.empty()
    $parent.append(editItem(ID,nome,nivel))
}

function createItem(ID, Nome, Nivel){
    return `
    <a href='blacklist.php?rotina=del&ID=${ID}'>[Excluir]</a><a href="#" onclick=\"btn_edit(event)\" class="edit" data-id="${ID}">[Editar]</a>  <span class="nome"> ${Nome} </span> - <span class="nivel"> ${Nivel} </span>`
}
function returnItem(event) {
    var $target = $(event.target);
    var $parent = $target.parent();
    var $li = $parent.parent();
    var nome = $parent.find("#Nicks").val();
    var nivel = $parent.find("#Níveis").val();
    var id = $parent.find("[name=\"ID\"]").val();
    var oldval = $parent.find("[name=\"oldval\"").val().split(",");
    console.log(oldval[0],oldval[1],oldval[2])
    
    $li.empty();
    $li.append(createItem(oldval[0],oldval[1],oldval[2]));

    
}
function editItem(ID,Nome,Nivel){
    return `
    <form action="blacklist.php?rotina=edit" method="POST">
        <input type="text" name="Nicks" id="Nicks" placeholder="Nome..." value="${Nome}"/>
        <input type="text" name="Nivel" id="Níveis" placeholder="Nível..."value="${Nivel}"/>
        <input type="hidden" name="ID" value="${ID}" />
        <input type="hidden" name="oldval" value="${ID},${Nome},${Nivel}" />
        <button type="submit">Submit </button>
        <button class="cancel" type="button" onclick="returnItem(event)">Cancel</button>
    </form>
    `
}
var $edit=$(".edit");

$edit.on('click' , function(event){
var $target = $(event.target)
var $parent = $target.parent()
var nome = $target.parent().find(".nome").text()
var nivel = $target.parent().find(".nivel").text()
var ID = $target.data("id")
console.log(event.target)
$parent.empty()
$parent.append(editItem(ID,nome,nivel))
})

