function btn_edit(event){
    var $target = $(event.target)
    var $parent = $target.parent()
    var title = $target.parent().find("nome").text()
    var description = $target.parent().find("nivel").text()
    var author = $target.parent().find("author").text
    var id = $target.data("id")
    $parent.empty()
    $parent.append(editItem(id,title,description,author))
}



function editItem(id,title,description,author){
return `
<form action="create.php" method="POST">
<div class="margincreate">
<input type="text" name="title" placeholder="Title..."/>
</div>
<div class="margincreate">
    <label for="description">Post Description:</label>
</div>
<div class="margincreate">  
<textarea  id="description" name="description" rows="10" cols="50" placeholder="Description..."></textarea>
</div>
<div class="margincreate">
<input type="text" name="author" placeholder="Author..."/>
<button type="submit">Submit</button>
</div> </form>
`
}
