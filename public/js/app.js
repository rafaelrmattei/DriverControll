window.maskMoney = function(input) {
  let value = input.value.replace(/\D/g, '')
  if(value == '' | value == '0' | value == '00'){
    input.value = ''
  } else {
    value = (Number(value) / 100).toFixed(2).replace('.', ',');
    let parts = value.split(',');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    input.value = parts.join(',');
  }
}

window.toggleModal = function(modalId, id){
  document.querySelector('#modal-expenses .modal-body').innerHTML = ''
  document.getElementById(modalId).classList.toggle("hidden")
  document.getElementById("modal-backdrop").classList.toggle("hidden")
  document.getElementById(modalId).classList.toggle("flex")
  document.getElementById("modal-backdrop").classList.toggle("flex")
  if(modalId == 'modal-expenses')
    document.querySelector('#modal-expenses .modal-body').innerHTML = document.getElementById('route-'+id).innerHTML;
}

window.tableSearch = function(tableId,value){  
  const filter = value.toLowerCase();
  const table  = document.getElementById(tableId);
  const lines  = table.getElementsByTagName('tr');
  for (let i = 1; i < lines.length; i++) {
    const line = lines[i];
    const columns = line.getElementsByTagName('td');
    let show = false;
    for (let j = 0; j < columns.length; j++) {
      const column = columns[j];
      if (column.innerHTML.toLowerCase().indexOf(filter) > -1) {
        show = true;
        break;
      }
    }
    line.style.display = show ? '' : 'none';
  }
}

window.autoFillLoginPassword = function(type,name){
  if(type == 'create'){
    const random_caracteres = ['#','@','$','&']
    const random_numbers    = [0,1,2,3,4,5,6,7,8,9]
    const name_password     = name.trim().split(" ")
    const login    = name_password[0]+'.'+name_password[name_password.length - 1]
    const password = random_caracteres[Math.floor(Math.random() * 3)]+random_numbers[Math.floor(Math.random() * 10)]+random_numbers[Math.floor(Math.random() * 10)]+name_password[0]
    document.getElementById('email').value    = login
    document.getElementById('password').value = password
  }
}

document.addEventListener('DOMContentLoaded', function() {      
  var element = document.getElementById('alert-errors');
  if(element !== null){
    const rows = element.querySelectorAll('li');  
    setTimeout(() => {
      rows.forEach((row) => {
        setTimeout(() => {
          row.remove();
        }, 500);
      });
    }, 3000);
  }
});

window.fillKmInicial = function(e){
  document.getElementById("km_initial").value = e.selectedOptions[0].dataset.km
}

window.addSupply = function(){
  const x = parseInt(document.getElementById('supply-group-x').value) + 1
  document.getElementById('supply-group-x').value = x
  const model = document.getElementById('supply-model').innerHTML
  document.getElementById('button-group-supply-container').insertAdjacentHTML('beforeend',model.replace(/{x}/g, x));
}

window.removeSupply = function(x){
  document.getElementById('supply-row-'+x).remove() 
}

window.addExpense = function(){
  const x = parseInt(document.getElementById('expense-group-x').value) + 1
  document.getElementById('expense-group-x').value = x
  const model = document.getElementById('expense-model').innerHTML
  document.getElementById('button-group-expense-container').insertAdjacentHTML('beforeend',model.replace(/{x}/g, x));
}

window.removeExpense = function(x){
  document.getElementById('expense-row-'+x).remove() 
}