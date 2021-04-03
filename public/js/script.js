$("#name").focusout(function() {
    var name = $(this).val();
    console.log(name);
    $("#cv_name").html(name);
});

$("#designation").focusout(function() {
    var designation = $(this).val();
    console.log(designation);
    $("#cv_designation").html(designation);
});

$("#business_name").focusout(function() {
    var business_name = $(this).val();
    console.log(business_name);
    $("#cv_business_name").html(business_name);
});

$("#description").focusout(function() {
    var description = $(this).val();
    console.log(description);
    $("#cv_description").html(description);
});

$("#wp_number").focusout(function() {
    var wp_number = $(this).val();
    console.log(wp_number);
    $("#cv_wp_number").html(wp_number);
});

/*$("#contacts").focusout(function() {
    var contacts = $(this).val();
    console.log(contacts);
    $("#cv_contacts").html(contacts);
});*/

$('#contacts').on('itemAdded', function(event) {
    // event.item: contains the item
    var contacts = $('#contacts').val();
    console.log(contacts);
    $("#cv_contacts").html(contacts);
});

$('#contacts').on('itemRemoved', function(event) {
    // event.item: contains the item
    var contacts = $('#contacts').val();
    console.log(contacts);
    $("#cv_contacts").html(contacts);
});

$("#address").focusout(function() {
    var address = $(this).val();
    console.log(address);
    $("#cv_address").html(address);
});


/*$("#photo").onchange(function() {
    var photo = $(this).val();
    console.log(photo);
    $("#cv_photo").attr('src',photo);
    //$("#cv_photo").attr('src', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==');

});*/
