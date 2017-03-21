function editContact(id){
  console.log(id);
  var contactToEdit = {
    name: $('#contactName'+id).html(),
    phone: $('#contactPhone'+id).html(),
    address: $('#contactAddress'+id).html(),
    email: $('#contactEmail'+id).html(),
  };

  $('#modal-id').val(id);
  $('#modal-name').val(contactToEdit.name);
  $('#modal-phone').val(contactToEdit.phone);
  $('#modal-address').val(contactToEdit.address);
  $('#modal-email').val(contactToEdit.email);
  console.log(contactToEdit);
};
