//alert('ok')

$(document).ready(function (){

$(document).on('click', 'a[data-role=update]', function(){
   // alert($(this).data('id'));
   var id = $(this).data('id');
   var name = $('#'+id).children('td[data-target=name]').text();
   var image = $('#'+id).children('td[data-target=image]').text();
   var description = $('#'+id).children('td[data-target=description]').text();
   var price = $('#'+id).children('td[data-target=price]').text();

   $('#name').val(name);
   $('#image').val(image);
   $('#description').val(description);
   $('#price').val(price);
   $('#produitId').val(id);
   $('#myModal').modal('toggle');
})

//recuperer data form et mettre a jour la database

$('#save').click(function(){
   // console.log('ok');
    var id = $('#produitId').val();
    var name = $('#name').val();
    var image = $('#image').val();
    var description = $('#description').val();
    var price = $('#price').val();

    $.ajax({
        url: 'update_produit.php',
        method: 'POST',
        data: {name : name, description : description, image : image,  price: price, id : id},
   // dataType: 'json',
        success: function(response){
            console.log(response)
            $("#message").append("Bravo le produit a été mis à jour");
        }
    })
})
})