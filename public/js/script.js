function editContact(id){
  var contactToEdit = {
    id: $('#contactID'+id).html(),
    name: $('#contactName'+id).html(),
    phone: $('#contactPhone'+id).html(),
    address: $('#contactAddress'+id).html(),
    email: $('#contactEmail'+id).html(),
  };
  $('#modal-name').val(contactToEdit.name);
  $('#modal-phone').val(contactToEdit.phone);
  $('#modal-address').val(contactToEdit.address);
  $('#modal-email').val(contactToEdit.email);
};
